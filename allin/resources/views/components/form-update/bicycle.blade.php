<form method="POST" action="{{ url('bicycle/' . $bicycle->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label for="person"><strong>Select an new owner:</strong></label>
        <select name="person_id" id="person" class="form-control">
            @foreach ($people as $person)
                <option value="{{ $person->id }} @if ( $bicycle->person && $bicycle->person->first_name == $person->first_name && $bicycle->person->last_name == $person->last_name) selected @endif ">
                    {{ $person->first_name }}{{ $person->last_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="brand"><strong> select a new Brand:</strong></label>
        <select name="brand" id="brand">
            @foreach ($bicycles as $newBicycle)
                <option value="{{ $newBicycle->brand }}" @if ($bicycle->brand == $newBicycle->brand) selected @endif>
                    {{ $newBicycle->brand }}</option>
            @endforeach
        </select>
        @error('brand')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="model"><strong>select a new Model:</strong></label>
        <select name="model" id="model">
            @foreach ($bicycles as $newBicycle)
                <option value="{{ $newBicycle->model }}" @if ($bicycle->model == $newBicycle->model) selected @endif>
                    {{ $newBicycle->model }}</option>
            @endforeach
        </select>
        @error('model')
            <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span>
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
