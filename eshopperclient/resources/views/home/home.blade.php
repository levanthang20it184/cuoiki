@extends('layout.master')
@section('title')
<title>Home page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('home/home.js')}}"></script>

@endsection
@section('content')
    
    
	<!--/slider-->
	@include('home.components.slider')
	<!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				@include('components.sidebar')
				
				<div class="col-sm-9 padding-right">
					<!--features_items extend từ file feature_product-->
					@include('home.components.featureproduct')
					<!--features_items-->
					
					<!--category-tab-->
					@include('home.components.tab_product')
					<!--/category-tab-->
					
					<!--recommended_items-->
					@include("home.components.recommed_product")
					<!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	
@endsection
