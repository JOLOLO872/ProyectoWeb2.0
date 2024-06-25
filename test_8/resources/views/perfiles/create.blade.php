@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Perfil</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('perfiles.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="menus">Menús</label>
                                <select name="menus[]" id="menus" class="form-control" multiple>
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Perfil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
