@extends('admin.template.main')

@section('title', 'Crear tag')

@section('content')
<div class="card">
  <div class="card-header bg-info">
     <h5>Crear tag</h5>
  </div>
  <div class="card-body">
    {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del tag', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
</div>
</div>
@endsection