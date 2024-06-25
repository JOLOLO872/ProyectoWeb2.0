<!-- resources/views/menus/edit.blade.php -->

@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Menú</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('menus.update', $menu->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $menu->nombre }}" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control">{{ $menu->descripcion }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar Menú</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    