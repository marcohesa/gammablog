@extends('adminlte::page')

@section('title', 'Blog i-gamma')

@section('content_header')
    <h1>Crear publicación</h1>
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
            {!! Form::open(['route' => 'admin.posts.store', 'files' => true]) !!}
                <div class="col p-0 mb-2">
                    <button id="generar" class="btn btn-primary" type="button">Agregar otro autor</button>
                </div>
                <div class="row">
                    <div class="col">
                        {!! Form::label('name', 'Titular de la noticia') !!}
                        {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('name', 'Categoría') !!}
                        {!! Form::select('category_id', $categories, '', ['class' => 'form-control', 'required', 'placeholder' => 'Selecciona una opción']) !!}
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    @if(Auth::user()->roles()->first()->id == 1 || Auth::user()->roles()->first()->id == 2)
                    <div class="col">
                        {!! Form::label('users', 'Autor 1') !!}
                        {!! Form::select('users[]', $users, '', ['class' => 'form-control', 'required', 'placeholder' => 'Selecciona una opción']) !!}

                        @error('users[]')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @endif

                    <div id="contenedor" class="d-flex p-0 m-0">
                      
                    </div>

                    {!! Form::hidden('status', 1, ['class' => 'form-control', 'required']) !!}

                    @if(Auth::user()->roles()->first()->id == 1 || Auth::user()->roles()->first()->id == 2))
                       
                       
                        {!! Form::hidden('status', 2, ['class' => 'form-control', 'required']) !!}

                        
                      
                        <div class="col">
                            {!! Form::label('publicationDate', 'Fecha de publicación') !!}
                            {!! Form::date('publicationDate', null, ['class' => 'form-control', 'required']) !!}

                            @error('publicationDate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif


                    <div class="col-12">
                        {!! Form::label('description', 'Copete de la noticia') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'required']) !!}

                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        {!! Form::label('body', 'Entrada y cuerpo de la noticia') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control', 'required']) !!}

                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mt-4">
                        {!! Form::label('file', 'Imagen principal') !!}
                        {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*', 'required']) !!}
                        <ul>
                            <li>La imagen debe tener un peso máximo de 1MB</li>
                            <li>Las dimensiones maximas de la imagen deben ser 800 x 600</li>
                            <li>Las dimensiones minimas de la imagen deben ser 640 x 480</li>
                        </ul>
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6 mt-4">
                        <div class="image-wrapper" >
                            <img style="width:200px!important;" id="image" src="img">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mt-4">
                        {!! Form::label('fileII', 'Imagen opcional uno') !!}
                        {!! Form::file('fileII', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                        <ul>
                            <li>La imagen debe tener un peso máximo de 1MB</li>
                            <li>Las dimensiones maximas de la imagen deben ser 800 x 600 pixeles</li>
                            <li>Las dimensiones minimas de la imagen deben ser 640 x 480 pixeles</li>
                        </ul>
                        @error('fileII')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mt-4">
                        <div class="image-wrapper" >
                            <img style="width:200px!important;" id="imageII" src="img">
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mt-4">
                        {!! Form::label('fileIII', 'Imagen opcional dos') !!}
                        {!! Form::file('fileIII', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                        <ul>
                            <li>La imagen debe tener un peso máximo de 1MB</li>
                            <li>Las dimensiones maximas de la imagen deben ser 800 x 600 pixeles</li>
                            <li>Las dimensiones minimas de la imagen deben ser 640 x 480 pixeles</li>
                        </ul>
                        @error('fileIII')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6 mt-4">
                        <div class="image-wrapper" >
                            <img style="width:200px!important;" id="imageIII" src="img">
                        </div>
                    </div>



                    <div class="mt-4 form-group">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-outline-primary', 'id' => 'save']) !!}
                        <button type="button" class="btn btn-outline-danger" onclick="confirmation()">Cancelar</button>

                    </div>


                </div>

            {!! Form::close() !!}
        </div>

    </div>

@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>



       CKEDITOR.replace( 'body' );
       CKEDITOR.config.height = 600;

        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);
        document.getElementById("fileII").addEventListener('change', cambiarImagenII);
        document.getElementById("fileIII").addEventListener('change', cambiarImagenIII);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("image").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
        function cambiarImagenII(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("imageII").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
        function cambiarImagenIII(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("imageIII").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }

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
                window.location.href = baseUrl + '/admin/posts'
            } else if (result.isDenied) {
                // Swal.fire('Changes are not saved', '', 'info')
            }
        });
       }

       let contador = 1;

        $('#generar').click(function(){
            $('#contenedor').append(`<div class="col" id="autor`+ contador +`" >  {!! Form::label('name', 'Autor `+ (parseInt(contador) + 1) +`' ) !!} {!! Form::select('users[]', $users, '', ['class' => 'form-control', 'required', 'placeholder' => 'Selecciona una opción']) !!}  @error('users')<span class="text-danger">{{ $message }}</span>@enderror</div>`);
            contador++
        });

        $('#genera').click(function(){
            $('#texto1').before(`<div class="col">  {!! Form::label('name', 'Categoría') !!} {!! Form::select('users[]', $users, '', ['class' => 'form-control', 'required', 'placeholder' => 'Selecciona una opción']) !!}  @error('users')<span class="text-danger">{{ $message }}</span>@enderror</div>`);
        });
      
    </script>
    <script src="{{ asset('js/disabledButton.js') }}"></script>
@stop

