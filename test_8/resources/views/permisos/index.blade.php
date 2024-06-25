<!-- resources/views/permisos/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listado de Permisos</div>

                    <div class="card-body">
                        <a href="{{ route('permisos.create') }}" class="btn btn-primary mb-3">Crear Permiso</a>

                        @if ($permisos->isEmpty())
                            <p>No hay permisos registrados.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Perfil</th>
                                        <th>Menú</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permisos as $permiso)
                                        <tr>
                                            <td>{{ $permiso->id }}</td>
                                            <td>{{ $permiso->perfil->nombre }}</td>
                                            <td>{{ $permiso->menu->nombre }}</td>
                                            <td>
                                                <a href="{{ route('permisos.edit', $permiso->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{ route('permisos.destroy', $permiso->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este permiso?')">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
