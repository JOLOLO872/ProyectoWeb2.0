@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hubo algunos problemas con tus entradas.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" style="height:150px" name="descripcion" placeholder="Descripción"></textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="text" name="precio" class="form-control" placeholder="Precio">
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="text" name="stock" class="form-control" placeholder="Stock">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection
