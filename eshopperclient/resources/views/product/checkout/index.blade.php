@extends('layout.master')
@section('title')
<title>Home page</title>

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
 --><script src="{{asset('home/home.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                
                
                <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="{{route('home')}}">Home</a></li>
                  <li class="active">Checkout</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <div class="cart_wapper">
                <table class="table table-condensed update_cart_url">
                    <thead class="cart">
                        <tr class="cart_menu">
                            
                            <td class="price" width="2%" >#</td>
                            <td class="image"with=10 >Name</td>
                            <td class="description">Email</td>
                            <td class="price">SĐT</td>
                            <td class="quantity">Số sản phẩm</td>
                            <td class="total">Price</td>
                            <td class="description">Tỉnh Thành</td>
                            <td class="price">Quận Huyện</td>
                            <td class="quantity">Xã Phường</td>
                            <td class="total">Phương thức thanh toán</td>
                            <td class="total">Total</td>

                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    
                        
                        
                        @foreach($donhangs as $donhang)

                       
                        <tr>
                            
                            <td class="cart_price">
                                {{$donhang->id}}
                            </td>
                            <td class="cart_description">
                                <h4>{{$donhang->name}}</h4>
                                
                            </td>
                            <td class="cart_description">
                                <h4>{{$donhang->email}}</h4>
                                
                            </td>
                            <td class="cart_description">
                                <h4>{{$donhang->sdt}}</h4>
                                
                            </td>
                            <td class="cart_description">
                                <h4>{{$donhang->quantity}}</h4>
                                
                            </td>
                            <td class="cart_price">
                                <h5>${{number_format($donhang->price)}}</h5>
                            </td>
                            <td class="cart_description">
                                <h5>{{$donhang->citys->name_city}}</h5>
                                
                            </td>
                            <td class="cart_description">
                                <h5>{{$donhang->province->name_quanhuyen}}</h5>                                
                            </td>
                            <td class="cart_description">
                                <h5>{{$donhang->wards->name_xaphuong}}</h5>
                                
                            </td>
                            <td class="cart_description">
                               <h5>{{$donhang->phuongthucthanhtoan}}</h5>
                                
                            </td>
                            <td class="cart_description">
                               <h5>{{number_format($donhang->total)}}</h5>
                                
                            </td>
                            
                            <td class="cart_delete">
                                
                                <a class="cart_quantity_delete actionDelete" data-url="{{route('checkout.delete',['id'=>$donhang->id])}}" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
            
                    </tbody>

                </table>
                <div style="margin-left: 850px;font-weight: 700" class="col-md-12">
                    <p class="cart_total_price"></p>
                    
                </div>
                
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->

	
	
@endsection