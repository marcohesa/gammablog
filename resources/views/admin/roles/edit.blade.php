@extends('adminlte::page')

@section('title', 'Learn Online')

@section('content_header')
    <h1>Learn Online</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-primary" role="alert">
    <strong>{{ session('info') }}</strong>

</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
          @include('admin.roles.partials.form')
        <br>
        {!! Form::submit('Actualizar', ['class'=>'btn btn-outline-primary mt-2']) !!}
        <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-danger mt-2">Cancelar</a>
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