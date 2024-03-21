@extends('master.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Players List</div>
                @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">& times;</span>
                    </button>
                </div>
                @endif
                <div class="card-body">
                    @component('components.players.players-list', ['players' => $players])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
