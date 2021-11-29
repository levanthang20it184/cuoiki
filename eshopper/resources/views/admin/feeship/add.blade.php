<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Admin </title>
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.choose').on('change',function()
       {
            var action=$(this).attr('id');
            var ma_id=$(this).val();
            var _token=$('input[name="_token"]').val();
            var result='';  
            // alert(action);
            // alert(ma_id);
            // alert(_token);
                if (action==='city') 
                {
                  result='province';

                }else{
                    result='wards';
                }
                $.ajax({
                    url:"/admin/delivery",
                    method:'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                      $('#'+result).html(data);
                    }
                });
       });

    //    $('.add_delivery').click(function()
    //    {
    //      var city=$('.city').val();
    //      var province=$('.province').val();
    //      var wards=$('.wards').val();
    //      var fee_ship=$('.fee_ship').val();
    //       var _token=$('input[name="_token"]').val();
    //      alert(city);
    //      alert(province);
    //      alert(wards);
    //      alert(fee_ship);
    //     alert(_token);
    //      $.ajax({
    //                 url:"/admin/delivery/insert",
    //                 method:'post',
    //                 data:{city:city,province:province,wards:wards,fee_ship:fee_ship,_token:_token},
    //                 success:function(data){
    //                   Swal.fire({
    //                                 position: 'top-end',
    //                                 icon: 'success',
    //                                 title: 'Thêm phí vận chuyển thành công! !',
    //                                 showConfirmButton: false,
    //                                 timer: 1500
    //                               })
                     
    //                 }
    //             });
    //    });
    });
</script>
@endsection

@endsection

@section('content')
    
<div class="content-wrapper">
   
    @include('partials.content-header',['name'=>'Feeship','key'=>'Add']);
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{route('feeship.store')}}"method="post">
              @csrf
                    <div class="form-group">
                        <label>Chọn Menu cha</label>
                        <select class="form-control choose city" name="city" id="city">
                        <option value="">--Chọn tỉnh thành phố--</option>
                            @foreach($city as $key => $citys)
                        <option value="{{$citys->matp}}">{{$citys->name_city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn Menu cha</label>
                        <select class="form-control province choose" name="province" id="province">
                        <option value="">--Chọn quận huyện--</option>
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn Menu cha</label>
                        <select class="form-control wards" name="wards" id="wards" >
                        <option value="">--Chọn xã phường--</option>
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Feeship</label>
                        <input type="text" class="fee_ship" name="fee_ship">
                    </div>
                    
                    
                    <button type="submit" name="add_delivery" class="btn btn-default update add_delivery">Thêm phí vận chuyển</button>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection

