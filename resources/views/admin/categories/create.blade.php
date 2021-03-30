@extends('adminlte::page')

@section('title', 'Blog i-gamma')

@section('content_header')
    <h1>Crear categoría.</h1>
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
            {!! Form::open(['route' => 'admin.categories.store']) !!}
                <div class="row">
                    <div class="col">
                        {!! Form::label('name', 'Nombre de la categoría') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                  
                </div>
               <div class="mt-4 form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-outline-primary', 'id' => 'save']) !!}
                    <button type="button" class="btn btn-outline-danger " onclick="confirmation()">Cancelar</button>
               </div>
                
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
                window.location.href = baseUrl + '/admin/categories'
            } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
            }
        });
       }
    </script>
        <script src="{{ asset('js/disabledButton.js') }}"></script>
@stop
