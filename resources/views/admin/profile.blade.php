@extends('adminlte::page')

@section('title', 'Blog i-gamma')

@section('content_header')
    <h1>Crear usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {{-- {!! Form::model($user,['route' => ['admin.users.',$user], 'method' => 'put']) !!}
                <div class="row">
                    <div class="col">
                        {!! Form::label('name', 'Nombre completo') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('name', 'Correo electrónico') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('name', 'Institución') !!}
                        {!! Form::select('institution_id', $institutions, null, ['class' => 'form-control']) !!}

                        @error('institution_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        {!! Form::label('name', 'Descripción') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        {!! Form::label('name', 'Formación') !!}
                        {!! Form::textarea('estudies', null, ['class' => 'form-control']) !!}

                        @error('estudies')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                
                </div>
                <div class="mt-4 form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-outline-primary']) !!}
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-danger">Cancelar</a>
                </div>
                
            {!! Form::close() !!} --}}
        </div>

    </div>
@stop

