@extends('admin.template.main')

@section('title', 'Editar categoria ' . $category->name)

@section('content')
<div class="card">
  <div class="card-header bg-info">
    <h5>{!! 'Editar categoria - ' . $category->name !!}</h5>
  </div>
  <div class="card-body">
<!-- Formulario para editar categorias -->
{!! Form::open(['route' => ['categories.update', $category], 'method' => 'PUT']) !!}

<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria', 'required']) !!}
</div>
<div class="form-group">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
{!! Form::close() !!}
<!-- Fin del formulario -->
</div>
</div>

@endsection