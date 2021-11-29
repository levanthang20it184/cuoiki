<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Admin </title>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('admins/product/index/list.css')}}" />

@endsection

@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/product/index/list.js')}}"></script>
@endsection

@section('content')
    

<div class="content-wrapper">
    
    @include('partials.content-header',['name'=>'Product','key'=>'List']);
 


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
                  <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
                     <table class="table">
                        <thead>
                          <tr>
                           <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Price</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Action</th>
                            
                          </tr>
                        </thead>  
                        <tbody>
                        
                          @foreach($product1 as $productItem)
                          <tr>
                          
                            <th scope="row">{{$productItem->id}}</th>
                            <td>{{$productItem->name}}</td>
                            <td>{{number_format($productItem->price)}}</td>
                            <td><img class="product_image_150_100" src="{{$productItem->feature_image}}" alt=""></td>
                            <td>{{optional($productItem->category)->name??'None'}}</td>
                            <td>
                               <a href="{{route('product.edit',['id'=>$productItem->id])}}"class="btn btn-default">Edit</a>
                               <a href="" data-url="{{route('product.delete',['id'=>$productItem->id])}}"class="btn btn-danger actionDelete">Delete</a>
                            </td>
                            
                          </tr>
                          @endforeach
                        </tbody>
                        
                   </table>
          </div>
           <div>
           <div class="col-12">{{ $product1->links()}}</div>

           </div>      
        </div>
        
      </div>
    </div>

  </div>


@endsection

