@extends('admin.template.main')

@section('title', 'Agregar categoria')

@section('content')
<div class="card">
  <div class="card-header bg-info">
     <h5>Crear categoria</h5>
  </div>
  <div class="card-body">
    {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancelar</a>
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection