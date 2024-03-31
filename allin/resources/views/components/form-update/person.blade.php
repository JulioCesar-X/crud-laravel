<form method="POST" action="{{ url('person/' . $person->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="first_name"><strong>First Name:</strong></label>
        <input type="text" id="first_name" name="first_name" autocomplete="first_name"
            class="form-control  @error('first_name') is-invalid @enderror" value="{{ $person->first_name }}" required
            aria-describedby="first_namelHelp">
        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="last_name"><strong>Last Name:</strong></label>
        <input type="text" id="last_name" name="last_name" autocomplete="last_name"
            class="form-control         @error('last_name') is-invalid @enderror" value="{{ $person->last_name }}"
            required aria-describedby="last_namelHelp">
        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="birth_date">Choose your Birth Date: </label>
        <input type="date" id="birth_date" name="birth_date" autocomplete="birth_date"
            class="form-control @error('date') is-invalid @enderror" value={{ $person->birth_date }} required>
        @error('birth_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="country"><strong>Select your Country:</strong></label>
        <select name="country_id" id="country" class="form-control" value="{{ $person->country->name }}">
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
    @if ($person->bicycles)
        @foreach ($person->bicycles as $bicycle)
            <div class="form-group">
                <label for="model{{ $bicycle->id }}"><strong>Select model for Bicycle {{ $loop->iteration }}:</strong></label>
                <select
                  name="bicycles[{{ $bicycle->id }}][model]"
                  id="model{{ $bicycle->id }}"
                  class="form-control">
                    @foreach ($bicycles as $newBicycle)
                        <option value="{{ $newBicycle->model }}" @if ($bicycle->model == $newBicycle->model) selected @endif> {{ $newBicycle->model }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="color{{ $bicycle->id }}"><strong>Select color for Bicycle {{ $loop->iteration }}:</strong></label>
                <select
                  name="bicycles[{{ $bicycle->id }}][color]"
                  id="color{{ $bicycle->id }}"
                  class="form-control">
                    @foreach ($bicycles as $newBicycle)
                        <option value="{{ $newBicycle->color }}" @if ($bicycle->color == $newBicycle->color) selected @endif style="color:white; background-color:{{ $newBicycle->color }}"> {{ $newBicycle->color }}</option>
                    @endforeach
                </select>
            </div>
        @endforeach
    @endif
    <div class="btn-form">
        <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
    </div>
</form>
