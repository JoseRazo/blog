@extends('admin.template.main')

@section('title', 'Listado de usuarios')

@section('content')
<div class="card">
  <div class="card-header bg-info">
    <h5>Listado de usuarios</h5>
  </div>
  <div class="card-body">
<a href="{{ route('users.create') }}" class="btn btn-info float-right my-3">Registrar nuevo usuario</a>
<div class="table-responsive-md">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo Electronico</th>
      <th scope="col">Tipo de Usuario</th>
      <th scope="col">Acción</th>
    </tr>
  </thead> 
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td> 
      <td>
         @if($user->type == "admin")
            <span class="badge badge-danger text-wrap">{{ $user->type }}</span>
        @else
            <span class="badge badge-primary text-wrap" disabled>{{ $user->type }}</span>
        @endif
      </td>
      <td>
      <a href="{{ route('users.edit', $user->id) }}" type="button" class="btn btn-danger"><i class="far fa-edit"></i></a>

      <a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" type="button" class="btn btn-warning"><i class="far fa-trash-alt"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

  <ul class="pagination justify-content-center">
    {!! $users->render() !!}
  </ul>

</div>
</div>
</div>
@endsection