<!-- resources/views/layouts/master.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Contenidos (CMS)</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap-custom.min.css') }}">
    <style>
        body {
            background: linear-gradient(to bottom, #660066 0%, #ff99cc 100%);
        }
        .full-height {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-container {
            max-width: 1000px;
            padding: 60px;
            border-radius: 150px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo-container {
            text-align: start;
            margin-bottom: 20px;
        }
        .logo-container img {
            width: 250px; /* Ajusta el tamaño de la imagen según sea necesario */
        }
        .title {
            text-align: center;
            color: #040404;
        }
        .form-container {
            margin-top: 0px;
        }
    </style>
</head>
<body>
    <div class="container-fluid full-height">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
</body>
</html>
