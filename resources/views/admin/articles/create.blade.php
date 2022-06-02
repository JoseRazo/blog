@extends('admin.template.main')

@section('title', 'Crear articulo')

@section('content')
<div class="card">
  <div class="card-header bg-info">
   <h5>Crear articulo</h5>
  </div>
    <div class="card-body">
    {!! Form::open(['route' => 'articles.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titulo del articulo', 'required']) !!}
        </div>

        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Selecciona una categoria...', 'required']) !!}
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    {!! Form::label('created_at', 'Fecha del evento') !!}
                    {!! Form::date('created_at', null, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Contenido') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor', 'placeholder' => 'Escribe el contenido del articulo', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('image', 'Imagen') !!}
            {!! Form::file('image') !!}
        </div>
        <div class="form-group">
            {!! Form::label('tags', 'Tags') !!}
            {!! Form::select('tags[]', $tags, null, ['class' => 'form-control select-tag', 'multiple']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Agregar articulo', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
    </div>
</div>
@endsection

@section('js')
    <script>
    //script para el editor de contenido
        $('#editor').trumbowyg({
            btns: [
                ['viewHTML'],
                ['undo', 'redo'], // Only supported in Blink browsers
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['table'],
                ['horizontalRule'],
                ['removeformat'],
                ['fullscreen']
            ]
        });

    //Creamos una clase para el selector de tags y le pasamos los parametros javascript
        $('.select-tag').chosen({
            placeholder_text_multiple: 'Seleccione un maximo de 3 tags',
            max_selected_options: 3,
            no_results_text: 'No se encontraron estos tags:',
            search_contains: true
        });
    </script>
@endsection