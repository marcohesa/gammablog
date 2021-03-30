@extends('adminlte::page')

@section('title', 'Integralidad GAMMA')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @can('Crear roles')
                <a class="btn btn-outline-success" href="{{ route('admin.roles.create') }}">Crear rol</a>            
            @endcan
            
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td width="10px">
                                    @can('Editar roles')
                                        <a class="btn btn-outline-dark" href="{{ route('admin.roles.edit', $role) }}">Editar</a>
                                    @endcan
                                        
                                </td>
                                <td width="10px">
                                    @can('Eliminar roles')
                                        <form action="{{ route('admin.roles.destroy', $role) }}" method="Post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger" type="submit">Eliminar</button>
        
                                        </form>
                                    @endcan
                                   
                                </td>
                            </tr>                        
                        @empty
                            <tr>
                                <td colspan="4">No hay roles</td>
                            </tr>
                        @endforelse
                </tbody>
            </table>
        
        </div>
   </div>
   
@stop

@section('js')
    @include('sweetalert::alert')
    <script src="{{ asset('js/disabledButton.js') }}"></script>
@stop