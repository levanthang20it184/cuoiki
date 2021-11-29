<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Admin </title>
<script src="https://cdn.tiny.cloud/1/288jvrknvgbpqshjk9u3uci2tpmeuj0djslkwwt0krryubs9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />

@endsection
@section('content')
    
<div class="content-wrapper">
   
    @include('partials.content-header',['name'=>'Product','key'=>'Edit']);
    <form action="{{route('product.update',['id'=>$product->id])}}"method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            
              @csrf
                    <div class="form-group">
                        <label >Tên sản phẩm </label>
                        <input type="text" class="form-control" placeholder=" Nhập tên sản phẩm    " value="{{$product->name}}" name="name">
                    </div>
                    <div class="form-group">
                        <label >Gía sản phẩm </label>
                        <input type="text" class="form-control" placeholder=" Nhập tên sản phẩm    "value="{{$product->price}}"name="price">
                    </div>
                    <div class="form-group">
                        <label >Ảnh đại diện</label>
                        <input type="file" class="form-control-file" placeholder=" Nhập tên sản phẩm   "  name="feature_image">
                        <div class="col-md-12">
                            <div class="row">
                                <img class="product_image_150_100" src="{{$product->feature_image}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label >Ảnh chi tiết</label>
                        <input type="file" multiple class="form-control-file" placeholder=" Nhập tên sản phẩm    "  name="image_path[]">
                          <div class="col-md-12">
                              <div class="row">
                                  @foreach($product->productImage as $productImageItem )
                                  <div style="margin:10px;" class="cal-md-3">
                                      <img class="product_image_150_10" src="{{$productImageItem->image_path}}" alt="">
                                  </div>
                                  @endforeach
                              </div>
                          </div>
                    </div>
                    <div class="form-group">
                        <label>Chọn danh mục</label>
                        <select class="form-control select2_init" name="category_id">
                        <option value="0">Chọn danh mục</option>
                        {!!$htmlOption!!} 
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nhập tag cho sản phẩm</label>
                        <select name='tags[]' class="form-control tag_select_choose" multiple="multiple">
                         @foreach($product->tags as $tagItem)
                         <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                         @endforeach
                        </select>
                    </div>
                    
                    
                    
                    
           
            </div>

            <div class="col-md-10">
                    <div class="form-group">
                        <label>Nhập nội dung</label>
                        <textarea name="content" class="form-control my-editor" rows="3" id="readonly-demo" > {{$product->content}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </div>
    </div>
  </div>
  </form>
@endsection

@section('js')
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>

<script src="{{asset('admins/product/add/add.js')}}"></script>
<script src="/path-to-your-tinymce/tinymce.min.js"></script>

@endsection