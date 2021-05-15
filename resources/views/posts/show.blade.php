@extends('welcome')

@section('cover')
    
  
    {{-- @if ($post->user->profile_photo_url)
        <a href="{{ route('users.show', $post->user->id) }}" style="text-decoration: none!important; color:white;">
            <h4>{{ $post->user->name }}</h4> 
            <img style="width: 100px!important;" class="rounded-circle img img-raised" src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
        </a>
        
    @endif   --}}
    <h6 class="text-center">Autor(es)</h6>

            <div class="card card-raised card-carousel" style="box-shadow: none!important; background: transparent!important;">
                <div id="authors" class="carousel slide" data-ride="carousel" data-interval="3000">
                {{-- <ol class="carousel-indicators">

                    @foreach ($post->users as $count)
                      
                         
                        <li data-target="#authors" data-slide-to="{{ $loop->iteration }}" class="@if($loop->first) active @endif"></li>
                        
                 
                   
                    @endforeach
                    
                
                </ol>
                 --}}
                <div class="carousel-inner ">
                    @foreach ($post->users as $author)
                   
                    
                    <div class="carousel-item @if($loop->first) active @endif">
                        <div class="card card-profile card-plain ">
                        <div class="card-avatar mt-4">
                            <a href="{{ route('users.show', $author->id) }}">
                            <img class="img " src="{{ $author->profile_photo_url }}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-white" >{{ $author->name }}</h6>
                            {{-- <h6 class="card-title">{{ $author->institution->name }}</h6>  --}}
                        
                            
                        </div>
                        </div>
                    </div>
                 
                @endforeach
                  
                </div>
                <a class="carousel-control-prev" href="#authors" role="button" data-slide="prev">
                    <i class="material-icons">keyboard_arrow_left</i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#authors" role="button" data-slide="next">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>

@endsection

@section('content')
    <div class="main main-raised">
        <a id="back" class="elevation-2" href="{{ route('posts.index') }}" style="text-decoration:none;position:fixed;left:5%;top:70%;"><i style="font-size:50px;color:black;" class="fas fa-chevron-circle-left"></i></a>
        <div class="container py-4">

            

            <h3 class="title text-center mb-4">{{ $post->title }}</h3>

            <div class="card card-raised card-carousel col-12 col-md-10 col-lg-8 mx-auto py-4"  style="box-shadow: none!important">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                {{-- <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    @if ($post->image->urlII)
                        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                    @endif
                    @if ($post->image->urlIII)
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                    @endif
                </ol> --}}
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset($post->image->url )}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        {{-- <h4>
                        <i class="material-icons">location_on</i> Yellowstone National Park, United States
                        </h4> --}}
                    </div>
                    </div>
                    @if ($post->image->urlII)
                        <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset($post->image->urlII )}}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            {{-- <h4>
                            <i class="material-icons">location_on</i> Somewhere Beyond, United States
                            </h4> --}}
                        </div>
                        </div>
                    @endif
                    @if ($post->image->urlIII)
                        <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset($post->image->urlIII )}}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            {{-- <h4>
                            <i class="material-icons">location_on</i> Yellowstone National Park, United States
                            </h4> --}}
                        </div>
                        </div>
                    @endif
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <i class="material-icons">keyboard_arrow_left</i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
           
            <div class="p-4" >
               
                <p class="text-justify">{!! $post->body !!}</p>

            </div>
          
            <hr>

            <div class="ml-auto mr-auto row d-flex justify-content-center">
                @if($posts->count() != 0 )
                    <h2 class="m-4 text-center col-md-12 title">Te puede interesar</h1>
                @endif

                @if($posts->count() >= 3 )
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @forelse ($posts as $item)
                                <div class="col-12 col-md-4 swiper-slide">
                                    <div class="card card-blog ">
                                    <div class="card-header card-header-image">
                                        <a href="#pablo">
                                        <img src="{{ asset($item->image->url) }}" alt="{{ $item->title }}">
                                        </a>
                                    </div>
                                    <div class="card-body ">
                                        <h6 class="card-category text-info " >{{ $item->category->name }}</h6>
                                        <h6 class="card-title ">
                                            {{ $item->title }}
                                        </h6>
                                    </div>
                                    </div>
                                </div>
                            @empty
                            
                            @endforelse
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        
                    </div>
                @else
                    @forelse ($posts as $item)
                        <div class="col-12 col-md-4 ">
                            <div class="card card-blog ">
                            <div class="card-header card-header-image">
                                <a href="#pablo">
                                <img src="{{ asset($item->image->url) }}" alt="{{ $item->title }}">
                                </a>
                            </div>
                            <div class="card-body ">
                                <a href="{{ route('posts.show', $item) }}">
                                    <h6 class="card-category text-info " >{{ $item->category->name }}</h6>
                                    <h6 class="card-title ">
                                        {{ $item->title }}
                                    </h6>
                                </a>
                            </div>
                            </div>
                        </div>
                    @empty
                    
                    @endforelse
                @endif
            </div>
            <br>


        </div>

    </div>

@stop
