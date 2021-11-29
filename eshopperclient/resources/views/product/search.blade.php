@extends('layout.master')
@section('title')
<title>Tìm Kiếm </title>

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
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
                
                <div class="col-sm-8 padding-right">
                    <!--features_items extend từ file feature_product-->
                    <div class="features_items"><!--features_items-->
                     <h2 class="title text-center">Features Items</h2>
                        @foreach($search_product as $search_products)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img class="styleanh" src="{{config('app.base_url').$search_products->feature_image}}" alt="" />
                                            <h2>{{number_format($search_products->price)}}VNĐ</h2>
                                            <p>{{$search_products->name}}</p>
                                            
                                            <a href="" data-url="{{route('product.add_cart',['id'=>$search_products->id])}}" class="btn btn-default add_to_cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                        @endforeach
                        
                </div>       
                
                    
                </div>
            </div>
        </div>
    </section>
    

	           
                

@endsection