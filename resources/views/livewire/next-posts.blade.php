<div class="ml-auto mr-auto row d-flex justify-content-center">
    @if($nextPosts->count() != 0 )
        <h2 class="m-4 text-center col-md-12 title">Próximas publicaciones</h1>
    @else
    
    @endif
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @forelse ($nextPosts as $nextPost)
                <div class="card card-blog col-md-4 swiper-slide">
                    <div class="card-header card-header-image">
                    
                        <img class="img img-raised" src="{{ asset($nextPost->image->url) }}" alt="{{ $nextPost->title }}">
                    
                    </div>
                    <div class="card-body">
                        <h6 class="category text-info"></h6>
                        <h4 class="card-title">
                            {{ $nextPost->title }}
                        </h4>
                        <p class="card-description">
                            {{ $nextPost->description }}
                        </p>
                    </div>
                </div>
            @empty
            
            @endforelse
        </div>
    </div>
</div>

