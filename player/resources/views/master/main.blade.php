<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css" />
    @yield('styles')
</head>
<body>

@component('layouts.app')
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
