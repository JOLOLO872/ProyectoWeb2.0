<!-- resources/views/menu_items/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Listado de Elementos de Menú</div>

                    <div class="card-body">
                        <a href="{{ route('menu-items.create') }}" class="btn btn-primary mb-3">Crear Elemento de Menú</a>

                        @if ($menuItems->isEmpty())
                            <p>No hay elementos de menú registrados.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Menú</th>
                                        <th>Nombre</th>
                                        <th>URL</th>
                                        <th>Orden</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menuItems as $menuItem)
                                        <tr>
                                            <td>{{ $menuItem->id }}</td>
                                            <td>{{ $menuItem->menu->nombre }}</td>
                                            <td>{{ $menuItem->nombre }}</td>
                                            <td>{{ $menuItem->url }}</td>
                                            <td>{{ $menuItem->orden }}</td>
                                            <td>
                                                <a href="{{ route('menu-items.edit', $menuItem->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{ route('menu-items.destroy', $menuItem->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este elemento de menú?')">Eliminar</button>
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
