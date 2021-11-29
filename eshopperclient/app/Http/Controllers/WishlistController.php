<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;


class WishlistController extends Controller
{
	public function list()
    {
    	$coutcart=0;
        $coutcart=Cart::get()->count();
    	$categorysLimit=Category::where('parent_id',0)->take(3)->get();
    	$wishlist=Wishlist::all();
        return view('product.wishlist.index',compact('categorysLimit','coutcart','wishlist'));
    }
    public function addwishlist($id)
    {
    	
    	$qt=1;

    	$product=Product::find($id);

    	$wishlist=Wishlist::firstWhere('product_id',$id);   	
    	if (!empty(Wishlist::where('name',$product->name)->count())) {
    		Wishlist::firstWhere('product_id',$id)->update([
    			'sao'=>$wishlist->sao+1,
    							]);
    	}else{	Wishlist::create([
               'image'=>$product->feature_image,
               'name'=>$product->name,
               'price'=>$product->price,
               'sao'=>1,
               'product_id'=>$id
							]);
			}

    	return response()->json([
    			'code'=>200,
    			'message'=>'success'
    	],status:200);
    	
    }

}
