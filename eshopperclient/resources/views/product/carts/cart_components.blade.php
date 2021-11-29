<table class="table table-condensed update_cart_url">
					<thead class="cart">
						<tr class="cart_menu">
							
							<td class="price" width="5%" >#</td>
							<td class="image" >Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					
						
						@php
						$total=0;
						@endphp
						@foreach($carts as $pcartItem)

						@php
						$total+=$pcartItem->price*$pcartItem->quantity;
						@endphp
						<tr>
							
							<td class="cart_price">
								{{$pcartItem->id}}
							</td>
							<td class="cart_product">
								<a href=""><img style="height: 150px;width: 150px;"src="{{config('app.base_url').$pcartItem->image_path}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="{{route('home')}}">{{$pcartItem->name}}</a></h4>
								<p>Web ID:{{$pcartItem->product_id}}</p>
							</td>
							<td class="cart_price">
								<p>${{number_format($pcartItem->price)}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input quantity" type="number" name="quantity" value="{{$pcartItem->quantity}}" autocomplete="off" min="1" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">${{number_format($pcartItem['price']*$pcartItem['quantity'])}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_update cart_update" data-id="{{$pcartItem->id}}" data-url="{{route('product.update_cart',['id'=>$pcartItem->id])}}" href=""><i class="bi bi-check-square-fill"></i></a>
								<a class="cart_quantity_delete actionDelete" data-url="{{route('product.delete_cart',['id'=>$pcartItem->id])}}" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
			
					</tbody>

				</table>
				<div style="margin-left: 850px;font-weight: 700" class="col-md-12">
					<p class="cart_total_price">Total:{{number_format($total)}}</p>
					
				</div>
				