@extends('adminlte::page')

@section('title', 'Blog i-gamma')

@section('content_header')
    <h1>Crear categoría.</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}
                <div class="row">
                    <div class="col">
                        {!! Form::label('name', 'Nombre de la categoría') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                  
                </div>
               <div class="mt-4 form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-outline-primary']) !!}
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-danger">Cancelar</a>
               </div>
                
            {!! Form::close() !!}
        </div>

    </div>
  
@stop

