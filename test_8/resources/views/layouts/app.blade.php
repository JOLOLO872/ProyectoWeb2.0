<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-custom.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Agrega aquí otros estilos si es necesario -->
</head>
<body>
    <header>
        <!-- Aquí puedes colocar el contenido del encabezado, como la barra de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('home') }}">Mi Aplicación</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- Coloca aquí los elementos de la barra de navegación -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('perfiles.index') }}">Perfiles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menus.index') }}">Menús</a>
                    </li>
                    <!-- Otros elementos de navegación -->
                </ul>
                <!-- Aquí puedes agregar elementos adicionales a la barra de navegación, como un formulario de búsqueda o botones de usuario -->
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </header>

    <main role="main">
        <!-- Aquí se incluirá el contenido específico de cada vista -->
        <div class="container mt-4">
            @yield('content')
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <!-- Aquí puedes colocar el pie de página -->
        <div class="container text-center">
            <span class="text-muted">© {{ date('Y') }} Mi Aplicación. Todos los derechos reservados.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>
</html>
