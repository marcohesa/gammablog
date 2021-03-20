<div class="ml-auto mr-auto col-md-10">
    <!--Barra de busqueda-->

    <div class="ml-auto mr-auto col-md-10">
        <div class="card card-raised card-form-horizontal">
        <div class="card-body">
            <input wire:model='search' type="text" placeholder="Buscar publicación" class="form-control" name="buscar" value = "">
        </div>
        </div>
    </div>

    <!-- Fin barra de busqueda -->
    <br>
    @forelse ($posts as $post)
        <div class="card card-plain card-blog">
            <div class="row">
            <div class="col-md-4">
                <div class="card-header card-header-image">
                <img class="img img-raised" src="{{ asset($post->image->url) }}" alt="{{ $post->title }}">
                </div>
            </div>
            <div class="col-md-8">
                <h6 class="mt-4 card-category text-info"></h6>
                <h3 class="card-title">
                <a href="">{{ $post->title }}</a>
                </h3>
                <p class="card-description">
                    {{ $post->description }}
                    <br>
                    <a href="{{ route('posts.show', $post) }}"> Leer más </a>
                </p>
                <p class="author">
                por 
                <a href="{{ route('users.show', $post->user->id) }}">
                    <b>{{ $post->user->name }}</b>
                </a>,   @php
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

    <div class="d-flex justify-content-center align-items-center">
        {{ $posts->links() }}
    </div>

    

    </div>

