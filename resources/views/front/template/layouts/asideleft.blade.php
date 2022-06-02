<!--<div class="card mb-3">
  <div class="card-header bg-info">
    Categorias
  </div>
    <div class="card-body">
      <ul class="list-group">
        @foreach($categories as $category)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <a href="{{ route('front.search.category', $category->name) }}">{{ $category->name }}</a>
          <span class="badge badge-primary badge-pill">{{ $category->articles->count() }}</span>
        @endforeach
      </li>
    </ul>
  </div>
</div>-->

<div class="card bg-light mb-3">
  <div class="card-header">
    <h4 class="font-italic">BUSCADOR</h4>
    <div class="progress mb-3" style="height: 1px;">
      <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

  <div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-12 mb-3">
      <!-- Buscador de articulos por titulo -->
        {!! Form::open(['route' => 'front.index', 'method' => 'GET']) !!}
            <div class="form-group">
             <label for="exampleInputText1">Por palabra clave:</label>
                {!! Form::text('title', null, ['class' => 'form-control form-control-sm', 'aria-describedby' => 'search']) !!}
            </div>
            <div class="form-group">
              <label for="from">Desde:</label>
              {!! Form::date('created_at', null, ['name'=>'from', 'id'=>'from', 'class'=> 'form-control form-control-sm mb-2']) !!}
            </div>
            <div class="form-group">
              <label for="to">Hasta:</label>
              {!! Form::date('created_at', null, ['name'=>'to', 'id'=>'to', 'class'=> 'form-control form-control-sm mb-2']) !!}
            </div>
            <button type="submit" class="btn btn-secondary btn-sm">Buscar</button>
        {!! Form::close() !!}
    <!--Fin del Buscador-->
    </div>

  <div class="col-12 col-sm-12 col-md-6 col-lg-12">
    <div class="card-header bg-danger text-white">
      Categorias
    </div>
    <div class="card-body">
      @foreach($tags as $tag)
      <span class="badge badge-warning">
        <a href="{{ route('front.search.tag', $tag->name) }}">{{ $tag->name }}</a>
      </span>
     @endforeach
    </div>
    <a class="btn btn-outline-info btn-block" href="/">Ver todas las noticias</a>
  </div>
  </div>

</div>
</div>

