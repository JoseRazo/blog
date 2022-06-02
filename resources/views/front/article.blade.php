@extends('front.template.main')

@section('title', $article->title)

@section('content')
	
	@section('main')
		<div class="row mt-2">
			<div class="col-xs-12 col-sm-8 col-md-8">
		    <h3>{{ $article->title }}</h3>
		    <small class="text-muted"><i class="material-icons">access_time</i>{{ $article->created_at->format('l jS \\of F Y') }}</small>
		  </div>
		  <div class="col-xs-12 col-sm-4 col-md-4">
  			@foreach($article->images as $image)
        	<img class="img-fluid" src="{{ asset('images/articles/' . $image->name) }}">
        @endforeach
        </div>
        </div>
	
		<div class="text-justify mt-3">
			<p>{!! $article->content !!}</p>
		</div>
	@endsection

	@section('asideleft')
 		@include('front.template.layouts.asideleft')
	@endsection
@endsection