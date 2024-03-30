@extends('master.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @component('components.index-list.person', ['people' => $people]) @endcomponent
        </div>
    </div>
</div>
@endsection

