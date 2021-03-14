@extends('welcome')

@section('cover')
    <h1 class="title">{{ $post->title }}</h1>
    <h4>{{ $post->user->name }}</h4> 
    @if ($post->user->profile_photo_url)
        <a href="{{ route('users.show', $post->user->id) }}">
            <img class="rounded-circle img img-raised" src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}">
        </a>
        
    @endif
    
@endsection

@section('content')
    <div class="main main-raised">
        <div class="container">
            <div class="p-4 d-flex justify-content-center col-md-12">
                <img class="col-12 col-md-7" src="{{ asset($post->image->url )}}" alt="{{ $post->title }}">
            </div>
            <div class="p-4" >
               
                <p class="text-justify">{!! $post->body !!}</p>
            </div>
        </div>

    </div>


    <div class="section">
        <div class="container">
         
            <div class="ml-auto mr-auto row d-flex justify-content-center">
                @if($posts)
                    <h1 class="m-4 text-center col-md-12">Te puede interesar</h1>
                @else
                
                @endif
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @forelse ($posts as $item)
                            <div class="card card-blog col-md-4 swiper-slide">
                                <div class="card-header card-header-image">
                                
                                    <img class="img img-raised" src="{{ asset($item->image->url )}}" alt="{{ $item->title }}">
                                
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-info"></h6>
                                    <h4 class="card-title">
                                        {{ $item->title }}
                                    </h4>
                                    <p class="card-description">
                                        {!! $item->description !!}
                                        <br>
                                        <a href="{{ route('posts.show', $item ) }}">Leer más</a>
                                    </p>
                                </div>
                            </div>
                        @empty
                        
                        @endforelse
                    </div>
                </div>
            </div>
            
           
        </div>
    </div>

@endsection