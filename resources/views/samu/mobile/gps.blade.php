@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> GPS</h3>

<pre>
@foreach($locations as $location)
    <li>{{ print_r($location->toArray()) }}</li>
@endforeach
</pre>

@endsection

@section('custom_js')

@endsection
