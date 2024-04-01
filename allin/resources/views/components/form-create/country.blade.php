<form method="POST" action="{{ url('country') }}" enctype="multipart/form-data">
    @method('POST')
    @csrf
    <div class="form-group">
        <label for="name"><strong>Select a Country</strong></label>
        <select name="name" id="name" class="form-control">
            @foreach ($countries as $country)
                <option value="{{ $country->get('admin') }}">{{ $country->get('admin') }}</option>
            @endforeach
        </select>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="btn-form">
        <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
    </div>
</form>
