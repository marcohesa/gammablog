@extends('adminlte::page')

@section('title', 'Learn Online')

@section('content_header')
    <h1>Crear nuevo rol</h1>
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
            {!! Form::open(['route' => 'admin.roles.store']) !!}
              @include('admin.roles.partials.form')
            <br>
            {!! Form::submit('Crear', ['class'=>'btn btn-outline-primary mt-2']) !!}
            <button type="button" class="btn btn-outline-danger mt-2" onclick="confirmation()">Cancelar</button>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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
                window.location.href = baseUrl + '/admin/roles'
            } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
            }
        });
       }
    </script>
    <script src="{{ asset('js/disabledButton.js') }}"></script>
@stop