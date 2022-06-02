<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>

    <div class="card card-login mx-auto text-center bg-dark">
    <div class="card-header-login mx-auto bg-dark">
        <span> <img src="http://www.utsalamanca.edu.mx/assets/img/pagina-principal/logouts.png" class="w-75 mb-3" alt="Logo"> </span><br/>
        <span class="logo_title"> Login Dashboard </span>
    </div>
    <div class="card-body">
        {!! Form::open(['route' => 'admin.auth.login', 'method' => 'POST']) !!}
            <div class="input-group form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text-login"><i class="fas fa-user"></i></span>
                </div>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@mail.com']) !!}
            </div>

            <div class="input-group form-group">
                <div class="input-group-prepend">
                     <span class="input-group-text-login"><i class="fas fa-key"></i></span>
                </div>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '********']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Acceder', ['class' => 'btn btn-outline-danger float-right login_btn']) !!}
            </div>
        {!! Form::close() !!}

    </div>
</div>

<!-- Añadir los scripts a nuestra plantilla recordar que primero debe ir el archivo jquery y despues el de bootstrap para que funcione -->
    <script src="{{ asset('plugins/jquery/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
</body>
</html>