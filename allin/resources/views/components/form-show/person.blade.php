<form method="#" action="{{ url('person') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="first_name"><strong>First Name:</strong></label>
        <input type="text" id="first_name" name="first_name" autocomplete="first_name"
            class="form-control  @error('first_name') is-invalid @enderror" value="{{ $person->first_name }}"
            aria-describedby="first_namelHelp" disabled>

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
             aria-describedby="last_namelHelp" disabled>
        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="birth_date">Choose your Birth Date: </label>
        <input type="date" id="birth_date" name="birth_date" autocomplete="birth_date"
            class="form-control @error('date') is-invalid @enderror" value={{ $person->birth_date }}  disabled>
        @error('birth_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="country"><strong>Select your Country:</strong></label>
        <input type="text" id="country" name="country" class="form-control @error('text') is-invalid @enderror"
            value={{ $person->country->name }}  disabled>
    </div>
    @if ($person->bicycles)
        @foreach ($person->bicycles as $bicycle)
            <div class="form-group">
                <label for="model{{ $bicycle->id }}"><strong> Bicycle {{ $loop->iteration }}:</strong></label>
                <input type="text" id="model{{ $bicycle->id }}"
                    class="form-control @error('text') is-invalid @enderror" value={{ $bicycle->model }}
                    disabled>
            </div>
            <div class="form-group">
                <label for="color{{ $bicycle->id }}"><strong> Bicycle {{ $loop->iteration }}:</strong></label>
                <input type="text" id="color{{ $bicycle->id }}"
                    class="form-control @error('text') is-invalid @enderror" value={{ $bicycle->color }}
                    disabled>
            </div>
        @endforeach
    @endif
    <div class="btn-form">
        <button type="submit" class="mt-2 mb-5 btn btn-primary">Back</button>
    </div>
</form>
