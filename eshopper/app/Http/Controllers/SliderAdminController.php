<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderAddRequest;
use App\Traits\storageImageTrait;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Log;
class SliderAdminController extends Controller
{
    use storageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider=$slider;
    }
    public function index()
    {
        $slider=$this->slider->Paginate(3);
        return view('admin.slider.index',compact('slider'));
    }
    public function create()
    {
        return view('admin.slider.add');
    }
    public function store(SliderAddRequest $request )
    {
        try {
            $dataInsert=[
                'name'=>$request->name,
                'description'=>$request->description,
      
              ];
              $dataImageSlider=$this->storageTraitUpload($request,'image_path','slider');
              if (!empty($dataImageSlider)) {
                 $dataInsert['image_name']=$dataImageSlider['file_name'];
                 $dataInsert['image_path']=$dataImageSlider['file_path'];
              }
              $this->slider->create($dataInsert);
              return redirect()->route('slider.index');
              
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
        
    }
    public function edit($id)
    {
        $slider=$this->slider->find($id);

        return view('admin.slider.edit',compact('slider'));
    }
    public function update( Request $request, $id)
    {
        try {
            $dataUpdate=[
                'name'=>$request->name,
                'description'=>$request->description,
      
              ];
              $dataImageSlider=$this->storageTraitUpload($request,'image_path','slider');
              if (!empty($dataImageSlider)) {
                 $dataUpdate['image_name']=$dataImageSlider['file_name'];
                 $dataUpdate['image_path']=$dataImageSlider['file_path'];
              }
              $this->slider->find($id)->update($dataUpdate);
              return redirect()->route('slider.index');
              
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    }
    public function delete($id)
    {
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code'=>200,
                'messsage'=>'Delete success'
            ],status:200);
        } catch (\Exception $exception) {
            
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
            return response()->json([
                'code'=>500,
                'messsage'=>'Delete fail'
            ],status:500);
        } 
    }
}
