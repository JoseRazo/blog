<!-- Modal para editar usuarios -->
<div class="modal fade" id="editUserModel" tabindex="-1" role="dialog" aria-labelledby="editUserModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editUserModelLabel">{{ 'Editar usuario ' . $user->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <!-- Formulario para editar usuario -->
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
        </div>
            <div class="modal-footer">
                <div class="form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    <a class="btn btn-danger" data-dismiss="modal">Cancelar</a>
                </div>
            </div>
            {!! Form::close() !!}
        <!-- Fin del formulario -->
        </div>
    </div>
</div>