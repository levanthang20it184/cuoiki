<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class HomeController extends Controller
{
    public function index()
    {
        $coutcart=0;
        $coutcart=Cart::get()->count();
        
        $slider=Slider::latest()->get();
        $categorys=Category::where('parent_id',0)->get();
        $products=Product::latest()->take(6)->get();
        $productsRecommed=Product::latest('views_count','desc')->take(12)->get();
        $categorysLimit=Category::where('parent_id',0)->take(3)->get();
        return view('home.home',compact('slider','categorys','products','productsRecommed','categorysLimit','coutcart'));
    }
    public function blog()
    {
        $coutcart=0;
        $coutcart=Cart::get()->count();

        $categorysLimit=Category::where('parent_id',0)->take(3)->get();
       return view('home.weather',compact('categorysLimit','coutcart'));
    }
    public function search(Request $request)
    {
        $keywords=$request->keywords_submit;

         $coutcart=0;
         $coutcart=Cart::get()->count();
         $categorysLimit=Category::where('parent_id',0)->take(3)->get();
         $search_product=Product::where('name','like','%'.$keywords.'%')->get();
         $categorys=Category::where('parent_id',0)->get();
         $slider=Slider::latest()->get();

         return view('product.search',compact('coutcart','categorysLimit','search_product','slider','categorys'));
    }
    public function loi()
    {
        return view('404');
    }
    
    public function test()
    {
        return view(view:'test');
    }
}
