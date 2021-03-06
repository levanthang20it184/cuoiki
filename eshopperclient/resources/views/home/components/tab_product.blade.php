					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								@foreach($categorys as $indexCategory => $categoryItem)
								<li class="{{$indexCategory==0?'active':''}}"><a href="#category_tab_{{$categoryItem->id}}" data-toggle="tab">{{$categoryItem->name}}</a></li>
								@endforeach								
							</ul>
						</div>
						<div class="tab-content">
							@foreach($categorys as $indexCategoryProduct => $categoryItemProduct)
							<div class="tab-pane fade {{$indexCategoryProduct==0?'active in':''}}" id="category_tab_{{$categoryItemProduct->id}}" >
								@foreach($categoryItemProduct->productss as $productItemTab)
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img class="styleanh" src="{{config('app.base_url').$productItemTab->feature_image}}" alt="" />
												<h2>{{number_format($productItemTab->price)}}</h2>
												<p>{{$productItemTab->name}}</p>
												<a href="#" data-url="{{route('product.add_cart',['id'=>$productItemTab->id])}}"class="btn btn-default add-to-cart add_to_cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
											
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							@endforeach
							
						</div>
					</div>