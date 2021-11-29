<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Admin </title>
@endsection

@section('content')
    
<div class="content-wrapper">
   
    @include('partials.content-header',['name'=>'Category','key'=>'Add']);
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{route('categories.store')}}"method="post">
              @csrf
                    <div class="form-group">
                        <label >Tên Danh Mục</label>
                        <input type="text" class="form-control" placeholder=" Nhập tên Danh Mục    " name="name">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label>Chọn Menu cha</label>
                        <select class="form-control" name="parent_id">
                        <option value="0">Chọn menu cha</option>
                        {!!$htmlOption!!}
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection

