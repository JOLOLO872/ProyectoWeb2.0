@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Productos</h1>
    @if(Auth::user()->role == 'admin')
    <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Producto</a>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->nombre }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->stock }}</td>
            <td>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('productos.show', $producto->id) }}">Ver</a>
                    @if(Auth::user()->role == 'admin')
                    <a class="btn btn-primary" href="{{ route('productos.edit', $producto->id) }}">Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
