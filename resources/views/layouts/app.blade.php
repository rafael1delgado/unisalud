<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>

        <script src="https://kit.fontawesome.com/7c4f606aba.js" SameSite="None"
            crossorigin="anonymous"></script>

        <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">

        <link href="{{ asset('css/nunito.css') }}" rel="stylesheet">
        <!-- Styles -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
            crossorigin="anonymous">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"-->

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/ssi.css') }}" rel="stylesheet"-->

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        @production
        <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon.ico">
        @else
        <link rel="icon" type="image/vnd.microsoft.icon" href="/favicon-local.ico">
        @endproduction

        <!-- programador -->
        @yield('custom_js_head')

        @livewireStyles
    </head>
    <body>
        <nav class="navbar navbar-dark sticky-top bg-ssi flex-md-nowrap p-0 shadow ssi-azul">
            <a class="navbar-ssi @production ssi-rojo @else ssi-morado @endproduction col-md-3 col-lg-2 mr-0 px-3" href="{{ route('home') }}">Servicio de Salud</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav px-3 d-none d-md-block">
                <li class="nav-item">
                    <span class="nav-link">@auth {{ auth()->user()->firstName }} @endauth</span>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        @auth
                        @include('layouts.partials.nav')
                        @endauth
                    </div>
                </nav>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    @include('layouts.partials.errors')
                    @include('layouts.partials.flash_message')
{{--                    {{ $slot }}--}}
                    <hr>
                    @yield('content')
                </main>
            </div>
        </div>
        <!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script-->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script>
            feather.replace()
        </script>

        <!-- programador -->
        <script src="{{ asset('js/jquery/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/popper/popper.min.js') }}" ></script>
        <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        @yield('custom_js')

        @livewireScripts
    </body>
</html>
