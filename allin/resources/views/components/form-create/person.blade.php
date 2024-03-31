<form method="POST" action="{{ url('person') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="first_name"><strong>First Name:</strong></label>
        <input type="text" id="first_name" name="first_name" autocomplete="first_name" placeholder="Type your first name"
            class="form-control         @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"
            required aria-describedby="first_namelHelp">

        @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="last_name"><strong>Last Name:</strong></label>
        <input type="text" id="last_name" name="last_name" autocomplete="last_name" placeholder="Type your last name"
            class="form-control         @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"
            required aria-describedby="last_namelHelp">

        @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="birth_date">Choose your Birth Date: </label>
        <input
          type="date"
          id="birth_date"
          name="birth_date"
          autocomplete="birth_date"
          class="form-control @error('date') is-invalid @enderror"
          value={{
          old('birth_date')
          }}
          required>
          @error('birth_date')
          <span
          class="invalid-feedback"
          role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="country"><strong>Select your Country:</strong></label>
        <select name="country_id" id="country" class="form-control">
            @foreach ($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select>
    </div>
    {{-- <div class="form-group">
        <label for="image">Choose a image: </label>
        <input type="file" id="image" name="image" autocomplete="image"
            class="form-control @error('file') is-invalid @enderror" value={{ old('image') }} required>
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div> --}}
    <div class="btn-form">
        <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
    </div>
</form>
