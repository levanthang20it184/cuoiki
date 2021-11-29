/*price range*/

if ($.fn.slider) {
    $('#sl2').slider();
}

var RGBChange = function () {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
 

     $('.add_delivery').click(function()
       {
         var city=$('.city').val();
         var province=$('.province').val();
         var wards=$('.wards').val();
         var fee_ship=$('.fee_shipp').val();
         var product_id=$('.product_id').val();
         var phuongthuc=$('.phuongthuc').val();
         var name=$('.name').val();
         var email=$('.email').val();
         var sdt=$('.sdt').val();
        var _token=$('input[name="_token"]').val();
         // alert(city);
         // alert(province);
         // alert(wards);
         // alert(name);
         // alert(email);
         // alert(sdt);
         // alert(phuongthuc);
         // alert(fee_ship);
         // alert(_token);

         $.ajax({
                    url:"/delivery/insert",
                    method:'post',
                    data:{city:city,province:province,wards:wards,fee_ship:fee_ship,name:name,email:email,sdt:sdt,phuongthuc:phuongthuc,_token:_token},
                    success:function(data){
                      Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Đặt hàng thành công! !',
                                    showConfirmButton: false,
                                    timer: 1500
                                  })
                     
                    }
                });
       });
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

                }else if(action==='province'){
                    result='wards';
                }else{
                  result='fee_ship';
                }
                $.ajax({
                    url:"/delivery",
                    method:'post',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                      $('#'+result).html(data);
                    }
                });
       });
});
