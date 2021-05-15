@extends('adminlte::page')

@section('title', 'Blog i-gamma')

@section('content_header')
    <h1>Asignar rol</h1>
@stop

@section('content')
    @if(isset($errors) && $errors->any()) 
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h1 class="h5 font-weight-bold">Nombre: {{ $user->name }}</h1> <br><br>
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
                <hr>
                <h1 class="h5 my-5 font-weight-bold">Más información</h1> 
                <div class="row">
                    {{-- <div class="col">
                        {!! Form::label('name', 'Nombre completo') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('name', 'Correo electrónico') !!}
                        {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}
                    <div class="col-12 col-md-4">
                        {!! Form::label('facebook', 'Facebook') !!}
                        {!! Form::text('facebook', null, ['class' => 'form-control']) !!}

                        @error('facebook')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        {!! Form::label('twitter', 'Twiter') !!}
                        {!! Form::text('twitter', null, ['class' => 'form-control']) !!}

                        @error('twitter')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        {!! Form::label('name', 'Institución') !!}
                        {!! Form::select('institution_id', $institutions, null, ['class' => 'form-control', 'required', 'placeholder' => 'Selecciona una opción', 'required']) !!}

                        @error('institution_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        {!! Form::label('name', 'Descripción') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        {!! Form::label('name', 'Formación') !!}
                        {!! Form::textarea('estudies', null, ['class' => 'form-control']) !!}

                        @error('estudies')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                
                </div>
                {!! Form::submit('Actualizar', ['class'=> 'btn btn-outline-primary mt-2']) !!}
                <button type="button" class="btn btn-outline-danger mt-2" onclick="confirmation()">Cancelar</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function confirmation(){
        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host;
        Swal.fire({
            title: '¿Seguro desea salir sin guardar cambios?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: `Aceptar`,
            denyButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = baseUrl + '/admin/users'
            } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
            }
        });
       }
    </script>
    <script src="{{ asset('js/disabledButton.js') }}"></script>
@stop

