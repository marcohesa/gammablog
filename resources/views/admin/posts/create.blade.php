@extends('adminlte::page')

@section('title', 'Blog i-gamma')

@section('content_header')
    <h1>Crear publicación</h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'files' => true]) !!}
                <div class="row">
                    <div class="col">
                        {!! Form::label('name', 'Titulo de la noticia') !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}

                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        {!! Form::label('name', 'Categoría') !!}
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (Auth::user()->hasrole([1,2]))
                        <div class="col">
                            {!! Form::label('name', 'Autor') !!}
                            {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
                            
                            @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col">
                            {!! Form::label('name', 'Fecha de publicación') !!}
                            {!! Form::date('publicationDate', null, ['class' => 'form-control']) !!}
                            
                            @error('publicationDate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    @else
                    
                    @endif
                   
                    <div class="col-12">
                        {!! Form::label('name', 'Descripción de la noticia') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}

                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12">
                        {!! Form::label('name', 'Contenido de la noticia') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}

                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="col-12 col-md-6">
                        {!! Form::label('file', 'Imagen principal') !!}
                        {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                        <ul>
                            <li>La imagen debe tener un peso máximo de 1MB</li>
                            <li>Las dimensiones maximas de la imagen deben ser 600 x 800</li>
                        </ul>
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="image-wrapper" >
                            <img style="width:200px!important;" id="image" src="">
                        </div>
                    </div>
                   
                    <div class="mt-4 form-group">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-outline-primary']) !!}
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-danger">Cancelar</a>
                    </div>
                 
                
                </div>
                
            {!! Form::close() !!}
        </div>

    </div>
    
@stop

@section('js')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
       
        
    
       CKEDITOR.replace( 'body' );
       CKEDITOR.config.height = 600;  

        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("image").setAttribute('src', event.target.result); 
            };

            reader.readAsDataURL(file);
        }
    </script>
@stop

