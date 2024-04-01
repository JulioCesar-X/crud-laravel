<form method="#" action="{{ url('bicycle') }}">
    @csrf
    <div class="form-group">
        <label for="person"><strong>Owner:</strong></label>

        <input
          name="person_id"
          id="person"
          class="form-control"
          @if ($bicycle->person)
            value="{{ $bicycle->person->first_name }}{{ $bicycle->person->last_name }}"
          @else
            value="N/A"
          @endif
          disabled>
    </div>
    <div class="form-group">
        <label for="brand"><strong>Brand:</strong></label>
        <input
          name="brand"
          id="brand"
          class="form-control"
          value="{{ $bicycle->brand }}"
          disabled>
    </div>
    <div class="form-group">
        <label for="model"><strong>Model:</strong></label>
        <input
          name="model"
          id="model"
          value="{{ $bicycle->model}}"
          disabled>
    </div>
    <div class="form-group">
        <label for="color">Color: </label>
        <input
          type="color"
          id="color"
          value="{{ $bicycle->color }}"
          disabled>
    </div>
    <div class="form-group">
        <label for="price"><strong>Price:</strong></label>
        <input
          type="number"
          id="price"
          name="price"
          value="{{ $bicycle->price }}" disabled>
    </div>
    <div class="form-group">
        <label for="image">Image: </label>
        <div>
            <img src="{{ $bicycle->image }}" alt="photo">
        </div>
    </div>
    <div class="btn-form">
        <button type="submit" class="mt-2 mb-5 btn btn-primary">Back</button>
    </div>
</form>
