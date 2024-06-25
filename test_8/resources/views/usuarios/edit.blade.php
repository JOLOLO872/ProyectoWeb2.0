<!-- resources/views/usuarios/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Editar Usuario</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}">
        </div>
        <div class="form-group mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $usuario->email) }}">
        </div>
        <div class="form-group mt-3">
            <label for="perfil_id">Perfil</label>
            <select name="perfil_id" id="perfil_id" class="form-control">
                @foreach($perfiles as $perfil)
                    <option value="{{ $perfil->id }}" {{ $usuario->perfil_id == $perfil->id ? 'selected' : '' }}>{{ $perfil->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="password">Contraseña (Dejar en blanco para no cambiar)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group mt-3">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar Usuario</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
</body>
</html>
