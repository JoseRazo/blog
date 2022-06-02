@extends('admin.template.main')

@section('title', 'Listado de articulos')

@section('content')
<div class="card">
  <div class="card-header bg-info"> 
    <h5>Listado de articulos</h5>
  </div>
  <div class="card-body">
<a href="{{ route('articles.create') }}" class="btn btn-info mb-3">Registrar nuevo articulo</a>
 <!-- Buscador de articulos -->
        {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'float-right mb-3']) !!}
            <div class="input-group">
            <span class="input-group-text" id="search"><i class="fas fa-search"></i></span>
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Buscar articulo', 'aria-describedby' => 'search']) !!}
            </div>
        {!! Form::close() !!}
    <!--Fin del Buscador-->
<div class="table-responsive-md">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Categoria</th>
      <th scope="col">Usuario</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <th scope="row">{{ $article->id }}</th>
      <td>{{ $article->title }}</td>
      <td>{{ $article->category->name }}</td>
      <td>{{ $article->user->name }}</td>
      <td>
      <a href="{{ route('articles.edit', $article->id) }}" type="button" class="btn btn-danger"><i class="far fa-edit"></i></a>  
      <a href="{{ route('admin.articles.destroy', $article->id) }}" onclick="return confirm('¿Estás seguro de eliminar este articulo?')" type="button" class="btn btn-warning"><i class="far fa-trash-alt"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

  <ul class="pagination justify-content-center">
    {!! $articles->render() !!}
  </ul>

</div>
</div>
</div>
@endsection