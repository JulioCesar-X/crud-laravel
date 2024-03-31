@extends('master.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('Success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('Success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @component('components.index-list.person', ['people' => $people])
                @endcomponent
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $people->links() }}
    </div>
@endsection
