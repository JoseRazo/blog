@extends('admin.template.main')

@section('title', 'Crear usuario')

@section('content')
    <div class="card">
  <div class="card-header bg-info">
   <h5>Crear usuario</h5>
  </div>
    <div class="card-body">
    <!-- Formulario para registro de usuario -->
    {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Correo Electronico') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
        </div>

         <div class="form-group">
            {!! Form::label('password', 'Contraseña') !!}
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '**********', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('type', 'Tipo de Usuario') !!}
            {!! Form::select('type', ['' => 'Seleccione una opcion...', 'member' => 'Miembro', 'admin' => 'Administrador'],null, ['class' => 'custom-select', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
        </div>

    {!! Form::close() !!}
    <!-- Fin del formulario -->
  </div> 
</div>
@endsection