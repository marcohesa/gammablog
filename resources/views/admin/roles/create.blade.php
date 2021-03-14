@extends('adminlte::page')

@section('title', 'Learn Online')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
              @include('admin.roles.partials.form')
            <br>
            {!! Form::submit('Crear', ['class'=>'btn btn-outline-primary mt-2']) !!}
            <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-danger">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop