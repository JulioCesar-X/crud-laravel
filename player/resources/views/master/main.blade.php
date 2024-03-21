<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <meta name="viewport" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <title>Project </title>

    <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css" />
    @yield('styles')

</head>
<body>


@component('master.header')
@endcomponent

<main>

@yield('content')

</main>


@component('master.footer')
@endcomponent

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>
@yield('scripts')

</body>
</html>
