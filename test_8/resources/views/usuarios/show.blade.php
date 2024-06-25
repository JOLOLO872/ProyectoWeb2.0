<!-- resources/views/usuarios/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Detalles del Usuario</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title"><strong>Nombre:</strong> {{ $usuario->nombre }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $usuario->email }}</p>
            <p class="card-text"><strong>Perfil:</strong> {{ $usuario->perfil->nombre }}</p>
        </div>
    </div>

    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary mt-3">Volver al listado</a>
    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-primary mt-3">Editar Usuario</a>
</div>
</body>
</html>
