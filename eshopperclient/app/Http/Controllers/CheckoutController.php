<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Donhang;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
               $coutcart=0;
        $coutcart=Cart::get()->count();

    $categorysLimit=Category::where('parent_id',0)->take(3)->get();
    $donhangs=Donhang::paginate(12);
    	return view('product.checkout.index',compact('categorysLimit','donhangs','coutcart'));
    }

    public function delete($id)
    {
        try {
           Donhang::find($id)->delete();
           return response()->json([
            'code'=>200,
            'message'=>'fail'

        ],status:200);
        } catch (\Exception $exception) {
            
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'

            ],status:500);
        } 
    }
}
