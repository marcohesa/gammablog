@extends('adminlte::page')

@section('title', 'Integralidad GAMMA')

@section('content_header')
    <h1>Categorías</h1>
@stop

@section('content')
    @livewireStyles
    @livewire('admin.categories')
    @livewireScripts
@stop

@section('js')
    @include('sweetalert::alert')
    <script src="{{ asset('js/disabledButton.js') }}"></script>
@stop


