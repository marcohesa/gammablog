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

