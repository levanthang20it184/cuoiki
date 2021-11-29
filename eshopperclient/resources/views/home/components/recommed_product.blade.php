					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								
								@foreach($productsRecommed as $keyRecommend => $productsRecommedItem)
								 @if($keyRecommend%3==0)
								 <div class="item {{$keyRecommend==0?'active':''}}">
								 @endif	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img class="styleanh" src="{{config('app.base_url').$productsRecommedItem->feature_image}}" alt="" />
													<h2>{{number_format( $productsRecommedItem->price)}}</h2>
													<p>{{ $productsRecommedItem->name}}</p>
													<a href="#" data-url="{{route('product.add_cart',['id'=>$productsRecommedItem->id])}}" class="btn btn-default add-to-cart add_to_cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>

								@if($keyRecommend%3==2)
								 </div>
								@endif
									
								@endforeach
								
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div>