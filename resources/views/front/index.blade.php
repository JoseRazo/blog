@extends('front.template.main')

@section('title', 'Home')

@section('content')
 
 	@section('main')
		@include('front.template.layouts.noticias')
	@endsection

	@section('asideleft')
 		@include('front.template.layouts.asideleft')
	@endsection
@endsection
