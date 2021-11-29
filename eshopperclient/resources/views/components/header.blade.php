<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>{{getConfigValueSettingTable('phone_contact')}}</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> {{getConfigValueSettingTable('email')}}</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="{{getConfigValueSettingTable('facebook_link')}}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{getConfigValueSettingTable('twith_link')}}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{getConfigValueSettingTable('linkdin_link')}}"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="{{getConfigValueSettingTable('dribbble_link')}}"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="{{getConfigValueSettingTable('google_link')}}"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{asset('eshopper/images/home/logo.png')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right clearfix">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canada</a></li>
									<li><a href="">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="">Canadian Dollar</a></li>
									<li><a href="">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Account</a></li>
								<li><a href="{{route('wishlist.list')}}"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="{{route('checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="{{route('category.cart')}}"><span style="background: rgb(247, 89, 92)" class="badge badge-warning navbar-badge">{!!$coutcart!!}</span><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li>
									
									<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									{{auth()->check()?auth()->user()->name:""}}
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li class="dropdown-item"><a href="{{route('logout')}}"><i class="fa fa-lock"></i>Logout</a></li>
									
									
								</ul>
									</div>
										
									
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						@include('components.main_menu')

					<div class="col-sm-4">
						<form action="{{route('search')}}" method="post">
							@csrf
						<div class="search_box pull-right">
							<input type="text" name="keywords_submit" placeholder="Tìm Kiếm Sản Phẩm"/>
							<input style="margin-top: 0;color: black" type="submit" class="btn btn-primary btn-sm" value="Tìm Kiếm" name="search_items">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->