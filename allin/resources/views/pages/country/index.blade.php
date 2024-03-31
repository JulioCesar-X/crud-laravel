@extends('master.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @component('components.index-list.country', ['countries' => $countries]) @endcomponent
        </div>
    </div>
</div>
<div class="row justify-content-center">
    {{ $countries->links() }}
</div>
@endsection
