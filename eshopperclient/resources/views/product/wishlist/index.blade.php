@extends('layout.master')
@section('title')
<title>Home page</title>

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
    

	            <div class="features_items"><!--features_items-->
                    <div class="col-sm-9 padding-right">
                        <h2 class="title text-center">Wishlist</h2>
                        @foreach($wishlist as $wishlists)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img class="styleanh" src="{{config('app.base_url').$wishlists->image}}" alt="" />
                                            <h2>{{number_format($wishlists->price)}}VNĐ</h2>
                                            <p>{{$wishlists->name}}</p>
                                            <p>Số lượng sao:
                                                @for($i=0;$i<$wishlists->sao;$i++)
                                             <i style="color: #FFFF00" class="bi bi-star-fill"></i>
                                                 @endfor
                                            </p>
                                            <a href="" data-url="{{route('product.add_cart',['id'=>$wishlists->product_id])}}" class="btn btn-default add_to_cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                </div>
                                
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>       
                

@endsection