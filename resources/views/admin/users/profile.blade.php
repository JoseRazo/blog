@extends('admin.template.main')

@section('title', 'Actualizar perfil - ' . $user->name)

@section('content')
<div class="card">
  <div class="card-header bg-info">
    <h5>Actualizar perfil - {{$user->name}}</h5>
  </div>
  <div class="card-body">
      
    <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>

            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Hubo algunos problemas con la subida.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="row justify-content-center">
            <div class="profile-header-container">
                <div class="profile-header-img">
                    <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" />
                    <!-- badge -->
                    <div class="text-center">
                        <span class="badge badge-pill badge-info">{{$user->name}}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <form action="/admin/profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">Por favor suba un archivo de imagen valido. El archivo no debe ser mayor a 2MB.</small>
                </div>
                <button type="submit" class="btn btn-primary">Cambiar</button>
            </form>
        </div>

  </div>
</div>
@endsection