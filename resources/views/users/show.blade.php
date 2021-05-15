@extends('welcome')

@section('cover')
    <h2 class="title">{{ $user->name }}</h2>
    @if ($user->institution_id)
         <h4>{{ $user->institution->name }}</h4> 
    @endif
   
    @if ($user->profile_photo_url)
    
        <img style="width: 100px!important;" class="rounded-circle img img-raised" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
      
        
    @endif
    
@endsection

@section('content')
    <div class="main main-raised">
        
        <a id="back" class="elevation-2" href="{{ route('posts.index') }}" style="text-decoration:none;position:fixed;left:5%;top:70%;"><i style="font-size:50px;color:black;" class="fas fa-chevron-circle-left"></i></a>
        <div class="container">
            <div class="pt-5 m-auto row col-md-12">
                <div class="d-flex justify-content-center align-content-center name col-md-12">
                    @if ($user->facebook)
                        <a href="{{ $user->facebook }}" class=" btn btn-just-icon btn-link btn-facebook d-flex"><i class="fab fa-facebook"></i></a>
                    @endif
                    @if ($user->twitter)
                        <a href="{{ $user->twitter }}" class=" btn btn-just-icon btn-link btn-twitter d-flex"><i class="fab fa-twitter"></i></a>
                    @endif
                    <a href="mailto:{{ $user->email }}" class=" btn btn-just-icon btn-link btn-google d-flex"><i style="margin-top: -9px!important;" class="fa fa-envelope"></i></a>
                </div>
            </div>
         
   
            <div class="p-4 m-auto row col-md-12">
            <div class="ml-auto mr-auto col-md-6">
                <div class="profile-tabs d-flex justify-content-center">
                    <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                        @if ($user->description)
                            <li class="nav-item">
                                <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                                    Descripción
                                </a>
                            </li>
                        @endif
                        @if ($user->estudies)
                            <li class="nav-item">
                                <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                                    Formación
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            </div>
            <div class="tab-content tab-space">
            <div class="text-center tab-pane active gallery" id="studio">
                <div class="row">
                <div class="text-center description">
                    <p claSS="p-5 text-justify">{{ $user->description }} </p>
                </div>
                </div>
            </div>
            <div class="text-center tab-pane gallery" id="works">
                <div class="row">
                <div class="text-center description">
                    <p claSS="p-5 text-justify">{{ $user->estudies }} </p>
                </div>
                </div>
            </div>
            </div>
        </div>
  
    </div>  
@endsection