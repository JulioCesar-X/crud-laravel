<form method="POST" action="{{ url('country/'.$country->id) }}">
    @method('PUT')
    @csrf
    <div class="form-group justify-content-center">
        <div class="row">
            <label for="oldName"><strong>Country:</strong></label>
            <input type="text" id="oldName" value="{{ $country->name }}" readonly>
        </div>
        <div class="row">
            <label for="name"><strong>Select a new Country:</strong></label>
            <select name="name" id="name" class="form-control">
                @foreach ($countries as $newCountry)
                    @if ($newCountry->get('admin'))
                        <option value="{{ $newCountry->get('admin') }}">{{ $newCountry->get('admin') }}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="btn-form">
        <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
    </div>
</form>
