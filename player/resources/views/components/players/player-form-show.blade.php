<form method="GET" action="#">
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
        <input name = "address" type = "address" class="form-control" id="address" value="{{ $player->address }}" disabled>
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
    <div class="btn-form">
        <button type="edit" class="mt-2 mb-5 btn-pl btn-primary">
            <a href="{{ route('players.edit',['player' => $player->id]) }}">Editar</a>
        </button>
        <form method="POST" action="{{ route('players.destroy', ['player' => $player->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="mt-2 mb-5 btn-pl btn-danger"
                onclick="return confirm('Tem certeza que deseja excluir este jogador?')">Deletar
            </button>
        </form>
    </div>
</form>
