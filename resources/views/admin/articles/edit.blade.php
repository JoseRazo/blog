@extends('admin.template.main')

@section('title', 'Editar articulo - ' . $article->title)

@section('content')
<div class="card">
  <div class="card-header bg-info">
    <h5>{!! 'Editar articulo - ' . $article->title !!}</h5>
  </div>
  <div class="card-body">
    {!! Form::open(['route' => ['articles.update', $article], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Titulo') !!}
            {!! Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => 'Titulo del articulo', 'required']) !!}
        </div>
            
        <div class="row">
            <div class="col-md">
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria') !!}
                    {!! Form::select('category_id', $categories, $article->category->id, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
          <div class="col-md">
                <div class="form-group">
                    {!! Form::label('created_at', 'Fecha del evento') !!}
                    {!! Form::date('created_at', $article->created_at, ['class' => 'form-control', 'required']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('content', 'Contenido') !!}
            {!! Form::textarea('content', $article->content, ['class' => 'form-control', 'id' => 'editor', 'placeholder' => 'Escribe el contenido del articulo', 'required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tags', 'Tags') !!}
            {!! Form::select('tags[]', $tags, $my_tags, ['class' => 'form-control select-tag', 'multiple']) !!}
        </div> 
        <div class="form-group">
            {!! Form::submit('Guardar Edición', ['class' => 'btn btn-primary']) !!}
             <a href="{{ route('articles.index') }}" class="btn btn-danger">Cancelar</a>
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
                ['fullscreen'],
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

    <script>
    //Creamos una clase para el editor del contenido de nuestro articulo y le pasamos los parametros javascript
    var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
        });
        }
    };

    tinymce.init(editor_config);
</script>
@endsection

