<div class="card">
    <div class="card-header">
        @can('Crear publicaciones')
            <a class="btn btn-outline-success" href="{{ route('admin.posts.create') }}">Crear publicación</a>              
        @endcan
        
    </div>
    <div class="card-body">
        <div class="col-12 col-sm-12 col-lg-12">
           
          
            <div class="card-body">
               
                <div class="table-responsive">
                    <div class="mb-2 row">
                        <div class="col">
                            <label for="">Filtrar por estado</label>
                            <select wire:model='status' name="status" class="form-control">
                                <option value="" selected>Todos</option>
                                <option value="1">Borrador</option>
                                <option value="2">Revisión</option>
                                <option value="3">Aprobados</option>
                                <option value="4">Publicados</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Buscar por título</label>
                            <input wire:model='search' type="text" placeholder="Buscar por titulo" class="form-control">
                        </div>
                    </div>
                    
                    <table class="table table-striped text-nowrap">
                        <thead>
                            <th>Titulo</th>
                            <th>Categoría</th>
                            <th>Autor(es)</th>
                            <th>Fecha de publicación</th>
                            <th colspan="4"></th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td> {{ Str::limit($post->title, 90) }}</td>
                                    <td> {{ $post->category->name }}</td>
                                    <td>
                                       @foreach ($post->users as $author)
                                          {{ mb_strtoupper($author->name) }} <br>
                                       @endforeach
                                    </td>
                                    <td>
                                        @if ($post->publicationDate)
                                            @php
                                                setlocale(LC_TIME, "spanish");		
                                            @endphp 
                                            {{ strftime("%d de %B de %Y", strtotime($post->publicationDate)) }}
                                        @else
                                            Sin asignar
                                        @endif
                                    <td width="10px">
                                       
                                        @can('Ver publicaciones')
                                            @if(Auth::user()->roles()->first()->id == 1 || Auth::user()->roles()->first()->id == 2)
                                                @if ($post->status == 1)
                                                    En borrador
                                                @else
                                                    <button wire:click="state({{ $post->id }})" wire:loading.attr="disabled" class="btn btn-outline-dark @if($post->status == 4) disabled @endif" >
                                                        @if ($post->status == 2)
                                                            Aprobar
                                                            <div wire:loading class="spinner-border spinner-border-sm" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        @elseif($post->status == 3)
                                                            Publicar
                                                            <div wire:loading class="spinner-border spinner-border-sm" role="status">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        @elseif($post->status == 4)
                                                        <i style="color: green;" class="fas fa-check-circle"></i>
                                                        @endif
                                                    </button>
                                                @endif
                                            @elseif(Auth::user()->roles()->first()->id == 3)
                                                @if ($post->status == 1)
                                                <button wire:click="state({{ $post->id }})" wire:loading.attr="disabled"  class="btn btn-outline-dark" >
                                                    Enviar a revisión
                                                    <div wire:loading class="spinner-border spinner-border-sm" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                </button>
                                                @elseif($post->status == 2)
                                                    En revisión
                                                @elseif($post->status == 3)
                                                    Aprobado
                                                @elseif($post->status == 4)
                                                <i style="color: green;" class="fas fa-check-circle"></i>
                                                @endif
                                            @endif
                                        @endcan 
                                       
                                    </td>
                                    <td width="10px">
                                        @can('Editar publicaciones')
                                            @if (Auth::user()->roles()->first()->id == 1 || Auth::user()->roles()->first()->id == 2 || (Auth::user()->roles()->first()->id == 3 && $post->status == 1))
                                               <a class="btn btn-outline-dark" href="{{ route('admin.posts.edit', $post) }}">Editar</a> 
                                            @endif
                                        @endcan
                                        
                                    </td>
                                    <td width="10px">
                                        @can('Eliminar publicaciones')
                                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                            </form>
                                        @endcan
                                        
                                    </td>
                            
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
               
            </div>
            <!-- /.card -->
       
        </div>
        
        
    </div>
    <div class="card-footer">
        
    </div>
</div>