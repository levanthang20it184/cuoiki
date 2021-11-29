<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Admin </title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/slider/add.css')}}">
@endsection
@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/slider/index/index.js')}}"></script>
@endsection
@section('content')
    

<div class="content-wrapper">
    
    @include('partials.content-header',['name'=>'Slider','key'=>'List']);
 


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
                  <a href="{{route('slider.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
                     <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên Slider</th>
                            <th scope="col" width="30%">Description</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Action</th>
                            
                          </tr>
                        </thead>  
                        <tbody>
                          @foreach($slider as $sliderItem)
                          <tr>
                            <th scope="row">{{$sliderItem->id}}</th>
                            <td>{{$sliderItem->name}}</td>
                            <td>{{$sliderItem->description}}</td>
                            <td><img class="image" src="{{$sliderItem->image_path}}" alt="">
                            </td>
                            <td>
                               <a href="{{route('slider.edit',['id'=>$sliderItem->id])}}"class="btn btn-default">Edit</a>
                               <a href=""data-url="{{route('slider.delete',['id'=>$sliderItem->id])}}"class="btn btn-danger actionDelete">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                         
                        </tbody>
                        
                   </table>
          </div>
           <div>
           
           </div>      
        </div>
        
      </div>
    </div>

  </div>

@endsection

