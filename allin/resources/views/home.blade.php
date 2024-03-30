@extends('master.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
                <ul>
                    <li><a href="/person">People list</a></li>
                    <li><a href="/resources/views/pages/country/index.blade.php">Countries list</a></li>
                    <li><a href="/resources/views/pages/bicycle/index.blade.php">Bicycles list</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
