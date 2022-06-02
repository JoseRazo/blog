<!-- Modal para editar categorias -->
<div class="modal fade" id="editCategoryModel" tabindex="-1" role="dialog" aria-labelledby="editCategoryModelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editCategoryModelLabel">{{ 'Editar categoria ' . $category->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <!-- Formulario para editar usuario -->
            {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Nombre de la categoria', 'required']) !!}
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