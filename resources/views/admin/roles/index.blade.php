@extends('adminlte::page')

@section('title', 'Learn Online')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-ligh alert-dismissible fade show" role="alert">
        {{ session('info') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-outline-success" href="{{ route('admin.roles.create') }}">Crear rol</a>
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
                                    <a class="btn btn-outline-dark" href="{{ route('admin.roles.edit', $role) }}">Editar</a>    
                                </td>
                                <td width="10px">
                                    <form action="{{ route('admin.roles.destroy', $role) }}" method="Post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger" type="submit">Eliminar</button>
    
                                    </form>
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop