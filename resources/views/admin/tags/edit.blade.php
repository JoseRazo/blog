@extends('admin.template.main')

@section('title', 'Editar tag - ' . $tag->name)

@section('content')
<div class="card">
  <div class="card-header bg-info">
    <h5>{!! 'Editar tag - ' . $tag->name !!}</h5>
  </div>
  <div class="card-body">
<!-- Formulario para editar tags -->
{!! Form::open(['route' => ['tags.update', $tag], 'method' => 'PUT']) !!}

<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', $tag->name, ['class' => 'form-control', 'placeholder' => 'Nombre del tag', 'required']) !!}
</div>
<div class="form-group">
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('tags.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
{!! Form::close() !!}
<!-- Fin del formulario -->
</div>
</div>
@endsection