<div class="ml-auto mr-auto row d-flex justify-content-center">
    @if($nextPosts->count() != 0 )
        <h2 class="m-4 text-center col-md-12 title">Próximas publicaciones</h1>
    @endif
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @forelse ($nextPosts as $nextPost)
                <div class="col-12 col-md-4 swiper-slide">
                    <div class="card card-blog ">
                      <div class="card-header card-header-image">
                        <a href="#pablo">
                          <img src="{{ asset($nextPost->image->url) }}" alt="{{ $nextPost->title }}">
                        </a>
                     </div>
                      <div class="card-body ">
                        <h6 class="card-category text-info">{{ $nextPost->category->name }}</h6>
                        <h6 class="card-title">
                            {{ Str::limit($nextPost->title, 250) }}
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
</div>

