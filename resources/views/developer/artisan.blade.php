@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Comandos Artisan</h1>
</div>

<a class="btn btn-success" href="{{route('developer.artisan.up')}}"> Artisan Up </a>
<a class="btn btn-warning" href="{{route('developer.artisan.down')}}"> Artisan Down </a>

@endsection

