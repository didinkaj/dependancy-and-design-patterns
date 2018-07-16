<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div id="app">
    <!--top bar nar-->
    @include('layouts.includes.topbarnav')

    <!--start of page -->
    <div class="container">
        <div class="row content">
            <!-- content -->
            @include('slots.error')
            <div class="col-sm-8 text-left">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
            <!--sidebar  navigation -->
            <div class="col-sm-4 sidenav py-4">
                @section('sidebar')
                    @include('layouts.includes.sidebarnav')
                @show
            </div>

        </div>
    </div>
    <!--footer -->
    <footer class="container-fluid text-center mb-0 ">
        @include('layouts.includes.footer')
    </footer>
</div>
</body>

</html>