<div class="card">
    <div class="card-header">
        @can('Crear usuarios')
            <a class="btn btn-outline-success" href="{{ route('admin.users.create') }}">Crear usuario</a>              
        @endcan
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="mb-2 row">
                <div class="col">
                    <label for="">Buscar por nombre</label>
                    <input wire:model='search' type="text" placeholder="Buscar por nombre" class="form-control">
                </div>
            </div>
            <table class="table table-striped text-nowrap">
                <thead>
                    <th>Nombre completo</th>
                    <th>Correo electrónico</th>
                    <th>Roles</th>
                    <th colspan="2"></th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ mb_strtoupper($user->name) }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @forelse ($user->roles as $role)
                                    {{ $role->name }} <br>
                                @empty
                                    Sin rol
                                @endforelse  
                            </td>
                            {{-- <td width="10px">
                                @can('Ver usuarios')
                                    <a class="btn btn-outline-dark" href="{{ route('admin.users.show', $user) }}">Ver/Editar</a>
                                @endcan
                            </td> --}}
                            <td width="10px">
                                @can('Editar usuarios')
                                    <a class="btn btn-outline-dark text-nowrap" href="{{ route('admin.users.edit', $user) }}">Asignar rol</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('Eliminar usuarios')
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
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
    </div>
    <div class="card-footer">
        {{ $users->links() }}
    </div>
</div>