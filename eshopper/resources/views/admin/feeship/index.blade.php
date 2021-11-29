<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Feeship </title>
@endsection
@section('js')
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/product/index/list.js')}}"></script>
@endsection
@section('content')
    

<div class="content-wrapper">
    
    @include('partials.content-header',['name'=>'Feeship','key'=>'List']);
 


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
                  <a href="{{route('feeship.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
                     <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">City </th>
                            <th scope="col">Province</th>
                            <th scope="col">Wards</th>
                            <th scope="col">Feeship</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>  
                        <tbody>
                        @foreach($feeship as $feeships)
                          
                          <tr>
                            <th scope="row">{{$feeships->fee_id}}</th>
                            <td>{{$feeships->citys->name_city}}</td>
                            <td>{{$feeships->province->name_quanhuyen}}</td>
                            <td>{{$feeships->wards->name_xaphuong}}</td>
                            <td>{{$feeships->fee_feeship}}</td>
                            <td>
                             
                               <a href="{{route('feeship.edit',['id'=>$feeships->fee_id])}}"class="btn btn-default">Edit</a>
                               
                               <a href=""data-url="{{route('feeship.delete',['id'=>$feeships->fee_id])}}"class="btn btn-danger actionDelete">Delete</a>
                             
                            </td>
                            
                          </tr>
                          @endforeach
                        </tbody>
                        
                   </table>
          </div>
           <div>
           {{ $feeship->links() }}
           </div>      
        </div>
        
      </div>
    </div>

  </div>

@endsection

