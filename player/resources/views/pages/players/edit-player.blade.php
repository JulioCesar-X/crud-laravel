@extends('master.main')

@section('content')
    <div class="container">
        <div class=" row justify-content-center">
            <div class="col-md-4">
                <h1>Edit Player</h1>
                <div class="margin-top">
                    @component('components.players.player-form-edit',['player' => $player, 'addresses' => $addresses])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection
