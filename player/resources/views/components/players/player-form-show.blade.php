<form method="POST" action="#">
    @csrf
    <div class="form-group">
        <label for="name"><strong>Name:</strong></label>
        <input type="text" id="name" name="name" autocomplete="name"
            class="form-control
        @error('name') is-invalid @enderror" value="{{ $player->name }}"
            aria-describedby="namelHelp" disabled>

        <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address"><strong>Type your address:</strong></label>
        <input name = "address_id" type = "address" class="form-control" id="address" value="{{ $player->address->address }}" disabled>
    </div>
    <div>
        <label for="description"><strong>Description:</strong></label>
         <textarea class="form-control is-invalid" id="description" name="description" disabled>{{ $player->description}}</textarea>
    </div>
    <div class="retired-m-top">
        <label for="retired"><strong>Retired:</strong></label>
        <div class="form-group">
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="retired" id="retired" @if($player->retired) checked @else disabled @endif >
                <label for="form-check-inline">Yes</label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="retired" id="retired" @if(!($player->retired)) checked @else disabled @endif>
                <label for="form-check-inline">No</label>
            </div>
        </div>
    </div>
    @if ($player->image)
    <div class="mb-3 justify-content-center">
        <img class="w-100 img-responsive" src="{{ asset('storage/'.$player->image) }}" alt="" title="">
    </div>
    @endif
    <div class="btn-form">
        <button type="edit" class="mt-2 mb-5 btn-pl btn-primary">
            <a href="{{ url('players/'.$player->id.'/edit') }}">Editar</a>
        </button>
       <form id="delete-form" method="POST" action="{{ url('players/'.$player->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="mt-2 mb-5 btn-pl btn-danger">Deletar</button>
        </form>
    </div>
</form>
