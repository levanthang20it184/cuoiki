<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>ADD </title>
@endsection
@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />

@endsection
@section('content')
    
<div class="content-wrapper">
   
    @include('partials.content-header',['name'=>'Product','key'=>'Add']);
    <div class="col-md-12">
    <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
    </div>
    <form action="{{route('product.store')}}"method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            
              @csrf
                    <div class="form-group">
                        <label >Tên sản phẩm </label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder=" Nhập tên sản phẩm    " name="name">
                        @error('name')
                            <div class="alert alert-danger error1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Gía sản phẩm </label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" placeholder=" Nhập tên sản phẩm    " name="price">
                        @error('price')
                            <div class="alert alert-danger error1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Ảnh đại diện</label>
                        <input type="file" class="form-control-file" placeholder=" Nhập tên sản phẩm    " name="feature_image">
                    </div>
                    <div class="form-group">
                        <label >Ảnh chi tiết</label>
                        <input type="file" multiple class="form-control-file" placeholder=" Nhập tên sản phẩm    " name="image_path[]">
                    </div>
                    <div class="form-group">
                        <label>Chọn danh mục</label>
                        <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="0">Chọn danh mục</option>
                        {!!$htmlOption!!}
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger error1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nhập tag cho sản phẩm</label>
                        <select name='tags[]' class="form-control tag_select_choose" multiple="multiple">
                        </select>
                    </div>
                    
                    
                    
                    
           
            </div>

            <div class="col-md-10">
                    <div class="form-group">
                        <label>Nhập nội dung</label>
                        <textarea name="content" class="form-control my-editor @error('content') is-invalid @enderror"  rows="8" id="readonly-demo">{{old('content')}}</textarea>
                        @error('content')
                            <div class="alert alert-danger error1">{{ $message }}</div>
                        @enderror
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
<script src="https://cdn.tiny.cloud/1/288jvrknvgbpqshjk9u3uci2tpmeuj0djslkwwt0krryubs9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="{{asset('admins/product/add/add.js')}}"></script>
<script src="/path-to-your-tinymce/tinymce.min.js"></script>

@endsection