<div class="card">
    <div class="card-header">
        @can('Crear categorias')
            <a class="btn btn-outline-success" href="{{ route('admin.categories.create') }}">Crear categoria</a>
        @endcan
        
    </div>
    <div class="card-body">
        <table class="table table-striped text-nowrap">
            <thead>
                <th>Nombre</th>
                <th colspan="2"></th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                   <tr>
                    <td>{{ $category->name }}</td>
                    <td width="10px">
                        @can('Editar categorias')
                            <a class="btn btn-outline-dark" href="{{ route('admin.categories.edit', $category) }}">Editar</a>
                        @endcan
                       
                    </td>
                    <td width="10px">
                        @can('Eliminar categorias')
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
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
    </div>
    <div class="card-footer">
        {{ $categories->links() }}
    </div>
</div>