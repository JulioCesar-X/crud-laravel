<form method="#" action="{{ url('country') }}">
    @csrf
    <div class="form-group justify-content-center">
        <div class="row">
            <label for="name"><strong>Country:</strong></label>
            <input type="text" id="name" value="{{ $country->name }}" readonly>
        </div>
        <div class="row">
            <div>
                <label for="name"><strong>Flag:</strong></label>
                <img src="{{ $country->image }}" alt="flag">
            </div>
        </div>
    </div>
    <div class="btn-form">
        <button type="submit" class="mt-2 mb-5 btn btn-primary">Back</button>
    </div>
</form>
