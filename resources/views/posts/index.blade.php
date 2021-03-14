@extends('welcome')

@section('background')
    style="background-image: url('iGamma/img/bg13.jpg')"
@endsection

@section('cover')
    <h1 class="title"> Blog i-Gamma</h1>
    <h4>Bienvenido</h4>
@endsection

@section('content')
    <div class="main main-raised">
        <div class="container">
            <div class="section" style="padding-top:0!important; padding-bottom: 0!important;">
                <div class="row">
                 
                    <div class="blogs-3">
                        <div class="container">
                            <div class="row">
                                @livewire('posts')
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>



    </div>


    <div class="section">
        <div class="container">
         
            @livewire('next-posts')
           
        </div>
    </div>
@endsection