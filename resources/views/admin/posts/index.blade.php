@extends('adminlte::page')

@section('title', 'Blog i-gamma')

@section('content_header')
    <h1>Publicaciones</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-ligh alert-dismissible fade show" role="alert">
            {{ session('info') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @livewireStyles
    @livewire('admin.posts')
    @livewireScripts
@stop

