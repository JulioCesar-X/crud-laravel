@extends('master.main')
@section('content')
    <div class="container">
        <div class=" row justify-content-center">
            <div class="col-md-4">
                <div class="margin-top">
                    @if (session('Success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('Success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @component('components.form-create.country')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection
