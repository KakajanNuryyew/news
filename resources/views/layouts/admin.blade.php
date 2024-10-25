<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <!-- Scripts -->
</head>

<body>
    @include('includes.header')

    <div id="app">
        <main >
            @yield('content')
        </main>
    </div>
    @include('includes.footer')
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>    
    <script src="{{ asset('assets/js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>


    @yield('js')
</body>
</html>
