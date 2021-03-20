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
                                <option value="1">Nuevos</option>
                                <option value="2">Aprobados</option>
                                <option value="3">Publicados</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Buscar por titulo</label>
                            <input wire:model='search' type="text" placeholder="Buscar por nombre" class="form-control">
                        </div>
                    </div>
                    
                    <table class="table table-striped">
                        <thead>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Fecha de publicación</th>
                            <th colspan="4"></th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->user->name }}</td>
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
                                            @if(Auth::user()->hasrole([1,2]))
                                                <a class="btn btn-outline-dark @if($post->status == 3) disabled @endif" href="{{ route('admin.posts.show', $post) }}">
                                                    @if ($post->status == 1)
                                                        Aprobar
                                                    @elseif($post->status == 2)
                                                        Publicar
                                                    @else
                                                    <i style="color: green;" class="fas fa-check-circle"></i>
                                                    @endif
                                                </a>
                                            @elseif(Auth::user()->hasrole([3]))
                                                @if ($post->status == 1)
                                                    En revisión
                                                @elseif($post->status == 2)
                                                    Aprobado
                                                @else
                                                <i style="color: green;" class="fas fa-check-circle"></i>
                                                @endif
                                            @endif
                                        @endcan 
                                       
                                    </td>
                                    <td width="10px">
                                        @can('Editar publicaciones')
                                            @if (Auth::user()->hasrole([1,2]) || (Auth::user()->hasrole([3]) && $post->status == 1))
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