@extends('admin.template.main')

@section('title', 'Listado de categorias')

@section('content')
<div class="card">
  <div class="card-header bg-info">
    <h5>Listado de categorias</h5>
  </div>
  <div class="card-body">
<a href="{{ route('categories.create') }}" class="btn btn-info float-right my-3">Registrar nueva categoria</a>
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
    @foreach($categories as $category)
    <tr>
      <th scope="row">{{ $category->id }}</th>
      <td>{{ $category->name }}</td>
      <td>
      <a href="{{ route('categories.edit', $category->id) }}" type="button" class="btn btn-danger"><i class="far fa-edit"></i></a>  
      <a href="{{ route('admin.categories.destroy', $category->id) }}" onclick="return confirm('¿Estás seguro de eliminar esta categoria?')" type="button" class="btn btn-warning"><i class="far fa-trash-alt"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $categories->render() !!}
</div>
</div>
</div>
@include('admin.template.layouts.modalEditCategory')
@endsection