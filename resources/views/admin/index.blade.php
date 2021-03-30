@extends('adminlte::page')

@section('title', 'Integralidad GAMMA')

@section('content_header')
    
@stop

@section('content')
    <div class="d-flex justify-content-center align-items-center m-auto">
        <h1 class="text-center"><span id="txtSaludo"></span> {{ Auth::user()->name }} <br> Bienvenido a Integralidad GAMMA</h1>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        function mostrarSaludo(){
 
            fecha = new Date(); 
            hora = fecha.getHours();

            if(hora >= 0 && hora < 12){
            texto = "Buenos días";
          
            }

            if(hora >= 12 && hora < 18){
            texto = "Buenas tardes";
          
            }

            if(hora >= 18 && hora < 24){
            texto = "Buenas noches";
          
            }

           

            document.getElementById('txtSaludo').innerHTML = texto;

        }
        mostrarSaludo();
    </script>
@stop