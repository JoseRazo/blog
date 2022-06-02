@extends('admin.template.main')

@section('title', 'Listado de tags')

@section('content')
<div class="card">
  <div class="card-header bg-info">
    <h5>Listado de tags</h5>
  </div>
  <div class="card-body">
    <a href="{{ route('tags.create') }}" class="btn btn-info mb-3">Registrar nuevo tag</a>
    <!-- Buscador de tags -->
        {!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'float-right mb-3']) !!}
            <div class="input-group">
            <span class="input-group-text" id="search"><i class="fas fa-search"></i></span>
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Buscar tag', 'aria-describedby' => 'search']) !!}
            </div>
        {!! Form::close() !!}
    <!--Fin del Buscador-->

    <div class="table-responsive-md">
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
            <th scope="row">{{ $tag->id }}</th>
            <td>{{ $tag->name }}</td>
            <td>
            <a href="{{ route('tags.edit', $tag->id) }}" type="button" class="btn btn-danger"><i class="far fa-edit"></i></a>  
            <a href="{{ route('admin.tags.destroy', $tag->id) }}" onclick="return confirm('¿Estás seguro de eliminar este tag?')" type="button" class="btn btn-warning"><i class="far fa-trash-alt"></i></a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {!! $tags->render() !!}
    </div>
</div>
</div>
@endsection