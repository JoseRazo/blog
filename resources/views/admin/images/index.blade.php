@extends('admin.template.main')

@section('title', 'Lista de imagenes')

@section('content')
	<div class="row">
		@foreach($images as $image)
			<div class="col-md-4 mb-3">
				<div class="card">
				  <img src="/images/articles/{{ $image->name }}" class="card-img-top" alt="{{ $image->name }}" title="{{ $image->name }}">
				  <div class="card-body">
				    <p class="card-text">{{ $image->article->title }}</p>
				  </div>
				</div>
			</div>
		@endforeach
	</div>
	{!! $images->render() !!}
@endsection