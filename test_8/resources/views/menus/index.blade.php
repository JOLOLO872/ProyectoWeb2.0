<!-- resources/views/menus/index.blade.php -->

@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listado de Menús</div>

                    <div class="card-body">
                        <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Crear Menú</a>

                        @if ($menus->isEmpty())
                            <p>No hay menús registrados.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menus as $menu)
                                        <tr>
                                            <td>{{ $menu->id }}</td>
                                            <td>{{ $menu->nombre }}</td>
                                            <td>{{ $menu->descripcion ?? '-' }}</td>
                                            <td>
                                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este menú?')">Eliminar</button>
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
