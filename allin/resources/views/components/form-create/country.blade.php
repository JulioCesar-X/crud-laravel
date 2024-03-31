<form method="POST" action="{{ url('country') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name"><strong>Name:</strong></label>
        <input type="text" id="name" name="name" autocomplete="name" placeholder="Type the name"
            class="form-control         @error('name') is-invalid @enderror" value="{{ old('name') }}" required
            aria-describedby="namelHelp">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Choose a image: </label>
        <input type="file" id="image" name="image" autocomplete="image"
            class="form-control @error('file') is-invalid @enderror" value={{ old('image') }} required>
        @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="btn-form">
        <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
    </div>
</form>
