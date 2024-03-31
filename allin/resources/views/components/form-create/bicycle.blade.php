<form method="POST" action="{{ url('bicycle') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="person"><strong>Select an owner:</strong></label>
        <select name="person_id" id="person" class="form-control">
            @foreach ($people as $person)
                <option value="{{ $person->id }}">{{ $person->first_name }} {{ $person->last_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="brand"><strong>Brand:</strong></label>
        <input type="text" id="brand" name="brand" autocomplete="brand" placeholder="Type the brand"
            class="form-control         @error('brand') is-invalid @enderror" value="{{ old('brand') }}" required
            aria-describedby="brandlHelp">

        @error('brand')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="model"><strong>Model:</strong></label>
        <input type="text" id="model" name="model" autocomplete="model" placeholder="Type the model"
            class="form-control         @error('model') is-invalid @enderror" value="{{ old('model') }}" required
            aria-describedby="modellHelp">

        @error('model')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="color">Choose a color: </label>
        <select name="color" id="color" class="form-control">
            @foreach ($bicycles as $key => $bicycle)
                <option value="{{ $bicycle->color }}" style="color:white; background-color: {{ $bicycle->color }}">
                    #{{ $key }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="price"><strong>Price:</strong></label>
        <input type="number" id="price" name="price" autocomplete="price" placeholder="Type a cost"
            class="form-control         @error('price') is-invalid @enderror" value="{{ old('price') }}" required
            aria-describedby="pricelHelp">

        @error('price')
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
