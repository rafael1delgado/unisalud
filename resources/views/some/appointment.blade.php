@extends('layouts.app')

@section('title', 'some')

@section('content')

<form>
    @livewire('some.asign-appointment', ['appointmentId' => $appointmentId])
</form>

@endsection

@section('custom_js')

@endsection
