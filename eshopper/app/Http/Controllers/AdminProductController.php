<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\storageImageTrait;
use App\Models\Product;
use Illuminate\Support\arr;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\ProductTag;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductAddRequest;
use Log;

class AdminProductController extends Controller
{ 
    use storageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Category $category,Product $product,ProductImage $productImage,Tag $tag,Product $productTag)
    {
      $this->category=$category;
      $this->product=$product;
      $this->productImage=$productImage;
      $this->productTag=$productTag;
      $this->tag=$tag;
    }
    public function index()
    {
        $product1=$this->product->Paginate(5);
        return view('admin.product.index',compact('product1'));
        
    }
    public function create()
    {
        $htmlOption=$this->getCategory($parentId=''); 
        return view('admin.product.add',compact('htmlOption'));
    }
    public function getCategory($parentId)
    {
         $data=$this->category->all();
         $recusive=new Recusive($data);
         $htmlOption=$recusive->categoryRecusive($parentId);
         return $htmlOption;
    }
    public function store(ProductAddRequest $request)
    { 

        try {
            DB::beginTransaction();
            $dataProductCreate=[
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->content,
                'user_id'=>auth()->id(),
                'category_id'=>$request->category_id
    
                       ];
            $dataUploadFeatureImage=$this->storageTraitUpload($request,fieldName:'feature_image',foderName:'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name']=$dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image']=$dataUploadFeatureImage['file_path'];
    
            }
            $products=$this->product->create($dataProductCreate);
            // dd($products); 
            
            // Insert data của product image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail=$this->storageTraitUploadMutiple( $fileItem,foderName:'product');
                    $products->images()->create([
                        
                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name'=>$dataProductImageDetail['file_name']
                    ]);
                    
                }
            }
    
            //Insert tags for product
            $tagIds=[];
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    //Insert to tag
                    $tagInstance=$this->tag->firstOrCreate([
                        'name'=>$tagItem
                    ]);
                    $tagIds[]=$tagInstance->id;
                }
               

            } 
            $products->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    }

    public function edit($id)
        {
            $product=$this->product->find($id);
            // DB::connection()->enableQueryLog();
            //  $product->productImage()->where('image_name','3.jpg')->get();
            //  $queries = DB::getQueryLog();
            // dd($queries);
            //  $product=$this->product->find($id);
            $htmlOption=$this->getCategory($product->category_id); 
           return view('admin.product.edit',compact('htmlOption','product'));
        }
    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate=[
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->content,
                'user_id'=>auth()->id(),
                'category_id'=>$request->category_id
    
                       ];
            $dataUploadFeatureImage=$this->storageTraitUpload($request,fieldName:'feature_image',foderName:'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name']=$dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image']=$dataUploadFeatureImage['file_path'];
    
            }
            $this->product->find($id)->update($dataProductUpdate);
            $products=$this->product->find($id);
            // dd($products); 
            
            // Insert data của product image
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id',$id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail=$this->storageTraitUploadMutiple( $fileItem,foderName:'product');
                    $products->images()->create([
                        
                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name'=>$dataProductImageDetail['file_name']
                    ]);
                    
                }
            }
    
            //Insert tags for product
            $tagIds=[];
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    //Insert to tag
                    $tagInstance=$this->tag->firstOrCreate([
                        'name'=>$tagItem
                    ]);
                    $tagIds[]=$tagInstance->id;
                }
                
            } 
            $products->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    }
    public function delete($id)
    {
        try {
           $this->product->find($id)->delete();
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
