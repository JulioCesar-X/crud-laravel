<form method="POST" action="{{ route("players.update",$player->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name"><strong>Name:</strong></label>
        <input type="text" id="name" name="name" autocomplete="name"
            class="form-control
        @error('name') is-invalid @enderror" value="{{ $player->name }}"
            aria-describedby="namelHelp">

        <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="address"><strong>Type your address:</strong></label>
        <input name = "address" type = "address" class="form-control" id="address" value="{{ $player->address }}">
    </div>
    <div>
        <label for="description"><strong>Description:</strong></label>
         <textarea class="form-control is-invalid" id="description" name="description">{{ $player->description }}</textarea>
    </div>
    <div class="retired-m-top">
        <label for="retired"><strong>Retired:</strong></label>
        <div class="form-group">
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="retired" id="retired" value ="1" @if($player->retired) checked @endif  >
                <label for="form-check-inline">Yes</label>
            </div>
            <div class="form-check-inline">
                <input class="form-check-input" type="radio" name="retired" id="retired" value ="0" @if(!($player->retired)) checked @endif >
                <label for="form-check-inline">No</label>
            </div>
        </div>
    </div>
    <div class="btn-form">
        <button type="submit" class="mt-2 mb-5 btn btn-primary">Submit</button>
    </div>
</form>
