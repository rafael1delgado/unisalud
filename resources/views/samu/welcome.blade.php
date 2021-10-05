@extends('layouts.app')

@section('content')
 
 
 @include('nav')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cu.min.css') }}" rel="stylesheet">
  


    <!-- Favicons -->
    <meta name="theme-color" content="#563d7c">

    <style>
        h1 {
            font-family: Sans-serif;
            font-weight: 200;
            color: #006fb3;
            font-size: 2.4rem;
        }
        .gb_azul {
            color: #006fb3;
        }
        .gb_rojo {
            color: #fe6565;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .bg-nav-gobierno {
            @switch(env('APP_ENV'))
                @case('local') background-color: rgb(73, 17, 82) !important; @break
                @case('testing') background-color: rgb(2, 82, 0) !important; @break
            @endswitch
        }
    </style>

</head>

<body>
   
   
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center container">
        <h1 class="display-5 mb-3">{{ env('APP_SS') }}</h1>
        <div class="d-flex justify-content-center">
            <table class="align-self-center">
                <tr>
                    <td style="background-color: #006fb3;" width="300" height="6"></td>
                    <td style="background-color: #fe6565;" width="300" height="6"></td>
                </tr>
            </table>
        </div>
        <p class="text-muted mt-4">Bienvenido al portal de sistemas del Servicio de Salud de Iquique.</p>

    </div>

    <div class="container">
        <div class="card-deck mb-3 text-center">
            <div class="col-md-3">

            </div>
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Ingresa</h4>
                </div>
                <div class="card-body">
                |   <i class="fas fa-hospital-user"></i>
                    <ul class="list-unstyled mt-3 mb-4">
                       
                        <p>Bienvenido al portal SAMU de la Región de Tarapacá.</p>

                    </ul>
                    

                    <div class="row justify-content-center">
                   
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <img class="mb-2" src="{{ asset('images/logo_ssi_100px.png') }}" alt="Logo Servicio de Salud Iquique">
                </div>
                <div class="col-6 col-md">
                    <h5>Portales del estado</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="http://www.gob.cl">Gobierno de Chile</a></li>
                        <li><a class="text-muted" href="http://www.minsal.cl">Ministerio de Salud</a></li>
                        <li><a class="text-muted" href="http://www.saludiquique.cl">Servicio de Salud Iquique</a> </li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Relacionados</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="text-muted" href="https://www.gob.cl/coronavirus/">Coronavirus</a></li>
                        <li><a class="text-muted" href="https://www.gob.cl/coronavirus/cifrasoficiales/">Cifras oficiales coronavirus</a> </li>
                        <li><a class="text-muted" href="https://www.gob.cl/plannacionaldecancer/">Plan nacional de cancer</a></li>

                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Desarrollado por</h5>
                    <ul class="list-unstyled text-small">
                        <li>Departamento TIC SSI</li>
                        <li><a class="text-muted" href="mailto:sistemas.ssi@redsalud.gobc.">sistemas.ssi@redsalud.gob.cl</a></li>
                        <small class="d-block mb-3 text-muted">&copy; 2021</small>
                    </ul>
                </div>
            </div>
        </footer>
    </div>

</body>

</html>
@endsection