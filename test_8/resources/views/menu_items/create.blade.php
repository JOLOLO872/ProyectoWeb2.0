<!-- resources/views/menu_items/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Elemento de Menú</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('menu-items.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="menu_id">Menú</label>
                                <select name="menu_id" id="menu_id" class="form-control">
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" name="url" id="url" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="orden">Orden</label>
                                <input type="number" name="orden" id="orden" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Elemento de Menú</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
