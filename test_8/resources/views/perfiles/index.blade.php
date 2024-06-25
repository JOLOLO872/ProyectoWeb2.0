<!-- resources/views/perfiles/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Perfiles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Listado de Perfiles</h1>

    <a href="{{ route('perfiles.create') }}" class="btn btn-primary mb-3">Crear Perfil</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perfiles as $perfil)
                <tr>
                    <td>{{ $perfil->id }}</td>
                    <td>{{ $perfil->nombre }}</td>
                    <td>{{ $perfil->descripcion }}</td>
                    <td>
                        <a href="{{ route('perfiles.show', $perfil) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('perfiles.edit', $perfil) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('perfiles.destroy', $perfil) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este perfil?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
