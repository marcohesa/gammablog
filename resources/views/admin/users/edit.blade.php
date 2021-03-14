@extends('adminlte::page')

@section('title', 'Blog i-gamma')

@section('content_header')
    <h1>Asignar rol</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="h5">Nombre: {{ $user->name }}</h1> <br><br>
            <h1 class="h5">Lista de roles</h1>
            @error('roles')
                <br>
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                </div>
                @endforeach
                {!! Form::submit('Asignar Rol', ['class'=> 'btn btn-outline-primary mt-2']) !!}
                 <a href="{{ route('admin.users.index') }}" class="mt-2 btn btn-outline-danger">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop

