<!-- resources/views/permisos/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Permiso</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('permisos.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="perfil_id">Perfil</label>
                                <select name="perfil_id" id="perfil_id" class="form-control">
                                    @foreach ($perfiles as $perfil)
                                        <option value="{{ $perfil->id }}">{{ $perfil->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="menu_id">Menú</label>
                                <select name="menu_id" id="menu_id" class="form-control">
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Crear Permiso</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
