@extends('master.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Addresses List</div>
                <div class="card-body">
                    @component('components.addresses.address-list', ['addresses' => $addresses])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
