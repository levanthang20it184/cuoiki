@extends('layout.master')
@section('title')
<title>Home page</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
//icon
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('home/home.js')}}"></script>
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
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<div class="cart_wapper">
					@include('product.carts.cart_components')
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
				<form>
					@csrf
					 <div class="row">
						<div class="col-sm-7">
							<div class="chose_area">
								<ul class="user_option">
									<li>
									
										<label>Name:</label><br>
										<input type="text" name="name" class="name">
										
									</li>
									<li>
									
										<label>Email:</label><br>
										<input type="text" class="email" id="email">

										<label>Phương thức thanh toán :</label>
										<select style="width: 200px" class="phuongthuc">
											<option value="">--Chọn Phương thức thanh toán--</option>
											<option>Thanh toán qua momo</option>
											<option>Thanh toán qua aribank</option>
											<option>Thanh toán tiền mặt</option>
											
										</select>
									</li>
									<li>
									
										<label>Số Điện Thoại:</label><br>
										<input type="text" class="sdt">

										
									</li>
									
									<div></div>
								</ul>
								<ul class="user_info">
									
									<li class="single_field">
										<label>Country:</label>
										<select name="city" id="city" class="choose city">
											<option value="" >--Chọn tính thành phố--</option>
											@foreach($city as $key => $citys)
											  <option value="{{$citys->matp}}">{{$citys->name_city}}</option>
											@endforeach
										</select>
									
									</li>
									<li class="single_field">
										<label>Province:</label>
										<select name="province"id="province" class="province choose">

											<option value="">--Chọn quận huyện--</option>
																					
										</select>
										
									</li>
									<li class="single_field">
										<label>Wards:</label>
										<select name="wards" id="wards" class="wards choose">
											<option value="">--Chọn xã phường--</option>
											
										</select>
										
									</li>
									<li class="single_field zip-field">
										<label>Phí vận chuyển:</label>
										<div class="fee_ship" id="fee_ship" name="fee_ship">
											
										</div>
										

									</li>
								</ul>
								<button type="button" name="add_delivery" class="btn btn-default update add_delivery">Đặt Hàng</button>
								<!-- <a class="btn btn-default update" href="">Get Quotes</a>
								<a class="btn btn-default check_out" href="">Continue</a> -->
							</div>
						</div>
						<div class="col-sm-5">
							<div class="total_area">
								<ul>
									<li>Cart Sub Total <span>$59</span></li>
									<li>Eco Tax <span>$2</span></li>
									<li>Shipping Cost <span>Free</span></li>
									<li>Total <span>$61</span></li>
								</ul>
									<a class="btn btn-default update" href="">Update</a>
									<a class="btn btn-default check_out" href="">Check Out</a>
							</div>
						</div>
					</div>
				</form>
		</div>
	</section><!--/#do_action-->
			</div>
		</div>
	</section>

@endsection