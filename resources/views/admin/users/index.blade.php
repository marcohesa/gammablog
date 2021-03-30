@extends('adminlte::page')

@section('title', 'Integralidad GAMMA')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    @livewireStyles
    @livewire('admin.users')
    @livewireScripts
@stop

@section('js')
    @include('sweetalert::alert')
    <script src="{{ asset('js/disabledButton.js') }}"></script>
@stop