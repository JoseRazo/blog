<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Acceso denegado') | Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>
    <section class="container">
    <img src="{{ asset('images/errors/403-Forbidden-Error.png') }}" class="img-fluid rounded mx-auto d-block" alt="Error 403">
    <div class="text-center">
    	<a href="{{ route('admin.index') }}">Volver al Panel de Administración</a>
    </div>
    </section>
<!-- Añadir los scripts a nuestra plantilla recordar que primero debe ir el archivo jquery y despues el de bootstrap para que funcione -->
    <script src="{{ asset('plugins/jquery/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>