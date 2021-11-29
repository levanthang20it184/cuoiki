<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class CategoryController extends Controller
{
    public function index($slug,$categoryId)
    {
    	
    	 $coutcart=0;
        $coutcart=Cart::get()->count();

        $categorysLimit=Category::where('parent_id',0)->take(3)->get();
        $products=Product::where('category_id',$categoryId)->paginate(12);
        $categorys=Category::where('parent_id',0)->get();
    	return view('product.category.list',compact('categorysLimit','products','categorys','coutcart'));
    }
}
