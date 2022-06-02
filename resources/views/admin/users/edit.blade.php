@extends('admin.template.main')

@section('title', 'Editar Usuario - ' . $user->name)

@section('content')
<div class="card">
  <div class="card-header bg-info">
    <h5>{!! 'Editar usuario - ' . $user->name !!}</h5>
  </div>
  <div class="card-body">
    <!-- Formulario para registro de usuario -->
    {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre completo', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Correo Electronico') !!}
            {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('type', 'Tipo de Usuario') !!}
            {!! Form::select('type', [$user->type => $user->type, 'member' => 'Miembro', 'admin' => 'Administrador'],null, ['class' => 'custom-select', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
        </div>

    {!! Form::close() !!}
    <!-- Fin del formulario -->
</div>
</div>
@endsection