<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Donhang;

class CartController extends Controller
{
	private $cart;
	public function __construct(Cart $cart)
	{
       $this->cart=$cart;
	}
    public function index()
    {
         $coutcart=0;
        $coutcart=Cart::get()->count();
    	// $cart=session()->get('cart');
    	$categorysLimit=Category::where('parent_id',0)->take(3)->get();
        $carts=Cart::latest()->paginate(12);

        // Chọn tỉnh thành phố 
        $city=City::orderby('matp','ASC')->get();
    	return view('product.carts.list',compact('categorysLimit','carts','city','coutcart'));

    }
    public function addtocart($id)
    {
    	
    	$qt=1;

    	$product=Product::find($id);
    	$cart=$this->cart->firstWhere('product_id',$id);   	
    	if (!empty(Cart::where('name',$product->name)->count())) {
    		$this->cart->firstWhere('product_id',$id)->update([
    			'quantity'=>$cart->quantity+1,
    							]);
    	}else{	Cart::create([
               'image_path'=>$product->feature_image,
               'name'=>$product->name,
               'price'=>$product->price,
               'quantity'=>1,
               'product_id'=>$id
							]);
			}

    	return response()->json([
    			'code'=>200,
    			'message'=>'success'
    	],status:200);
    	
    }

    public function updatetocart($id,Request $request)
    {
          $data=$request->all();
    		$this->cart->find($id)->update([
    			'quantity'=>$data['quantity'],
    		]);
    		return response()->json([
    			'code'=>200,
    			'message'=>'success'
    		],status:200);
    	
     }

   public function deletetocart($id)
    {
        try {
           $this->cart->find($id)->delete();
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

    public function select_delivery(Request $request)
    { 
          $data=$request->all();
          if ($data['action']) {
          	$output='';
          	     if ($data['action']=="city") {
          	     	$select_province=Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
			          	$output.='<option>----Chọn quận huyện-----</option>';
			          	foreach ($select_province as $key => $province){
			          		$output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
			          	                                                }
                                            }else if($data['action']=="province"){
          	$select_wards=Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
          	$output.='<option>----Chọn xa phuong-----</option>';
          	foreach ($select_wards as $key => $ward){
          		$output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
          	                                         }
          	                                                                   }else
                                                                               {
                                                                                $select_feeship=Feeship::Where('fee_xaid',$data['ma_id'])->orderby('fee_id','ASC')->get();
                                                                          
                                                                                foreach ($select_feeship as $key => $feeship){
                                                                                  $output.='<input class="fee_shipp" id="fee_ship" value="'.$feeship->fee_feeship.'">';
                                                                               }
                                                                             }

                               }
          echo $output;
    }

    public function insert_delivery(Request $request)
    {
      $totals=0;
      $i=0;
      $price=0;
      $carts=$this->cart->all();
      $data=$request->all();
      $donhang=new Donhang();
      foreach ($carts as $cart) {
        $i++;
        $price+=$cart->price;
        
        $totals+=$cart->price*$cart->quantity;
        
      }
      $donhang->quantity=$i;
      $donhang->price=$price;
      $donhang->matp=$data['city'];
      $donhang->maqh=$data['province'];
      $donhang->xaid=$data['wards'];
      $donhang->total=$data['fee_ship']+$totals;
      $donhang->name=$data['name'];
      $donhang->email=$data['email'];
      $donhang->sdt=$data['sdt'];
      $donhang->phuongthucthanhtoan=$data['phuongthuc'];

      $donhang->save();
    }

}
