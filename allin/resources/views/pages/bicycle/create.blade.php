@extends('master.main')
@section('content')
    <div class="container">
        <div class=" row justify-content-center">
            <div class="col-md-4">
                <div class="margin-top">
                    @component('components.form-create.bicycle', ['people' => $people,'bicycles' => $bicycles] )
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection
