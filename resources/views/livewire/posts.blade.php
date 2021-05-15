<div class="ml-auto mr-auto col-md-10">
    <!--Barra de busqueda-->

    <div class="ml-auto mr-auto col-12 col-md-10">
        <div class="card card-raised card-form-horizontal">
        <div class="card-body">
            <input wire:model='search' type="text" placeholder="Buscar publicación" class="form-control" name="buscar" value = "">
        </div>
        </div>
    </div>

    <!-- Fin barra de busqueda -->
    <br>
    <div class="d-flex justify-content-center align-items-center">
        {{ $posts->links() }}
    </div>
    @forelse ($posts as $post)
        <div class="card card-plain card-blog">
            <div class="row">
            <div class="col-md-4">
                <div class="card-header card-header-image">
                <img class="img img-raised w-100" src="{{ asset($post->image->url) }}" alt="{{ $post->title }}">
                </div>
            </div>
            <div class="col-md-8">
                <h6 class="card-category text-info">{{ $post->category->name }}</h6>
                <h4 class="card-title text-justify">
                    <a href="{{ route('posts.show', $post) }}">  {{ Str::limit($post->title, 250) }}</a>
                </h4>
                <p class="card-description text-justify">
                    {{ Str::limit($post->description, 270) }}
                    <br>
                    <div class="d-flex justify-content-between">
                        <a class="mr-4" href="{{ route('posts.show', $post) }}" style="color:black!important;"> <b>Leer más</b> </a>
                        <div class="social-buttons float-right">
                            <b>Compartir:</b>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=http://localhost:8000/posts/{{ $post->slug }}"
                            target="_blank">
                            <i class="fab fa-facebook" style="color: rgb(16, 94, 219); font-size:20px!important;"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=http://localhost:8000/posts/{{ $post->slug }}"
                                target="_blank">
                                <i class="fab fa-twitter-square" style="color: rgb(1, 183, 255); font-size:20px!important;"></i>
                            </a>
                        </div>
                    </div>
                </p>
                <p class="author">
                por 
                @foreach ($post->users as $author)
                <a href="{{ route('users.show', $author->id) }}">
                    <b style="font-size: 12px!important;">{{ mb_strtoupper($author->name) }}</b>
                </a>,
                @endforeach    
                @php
                    setlocale(LC_TIME, "spanish");		
                @endphp 
                El {{ strftime("%d de %B de %Y", strtotime($post->publicationDate)) }}
                </p>
            </div>
            </div>
        </div>
    @empty
        <h2 class="text-center title">No hay publicaciones disponibles</h2>
    @endforelse

    <div class="d-flex justify-content-center align-items-center mt-4">
        {{ $posts->links() }}
    </div>

    </div>

