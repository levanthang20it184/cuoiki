
	function AddToCart(event){

            event.preventDefault();
          let urlcart = $(this).data('url');
         
          $.ajax({
                    type: "GET",
                    url: urlcart,
                    dataType: 'json',
                    success: function(data)
                    {
                      if (data.code===200) {
                        Swal.fire({
                    title: 'ADD, Cart, Success!.',
                    width: 600,
                    height:600,
                    padding: '3em',
                    background: '#fff url(https://png.pngtree.com/png-vector/20191017/ourlarge/pngtree-hand-gesture-okay-ok-agree-approval-sign-vector-png-image_1805849.jpg)',
                    backdrop: `
                      rgba(0,0,123,0.4)
                      url("https://images.viblo.asia/a87852d0-d60c-4a7c-ae42-0bfb6679ecb3.gif")
                      left top
                      no-repeat
                    `
                  })
                      }
                    },
                    error:function()
                    {

                    }
                });
        }
    $(function(){
       
       $('.add_to_cart').on('click',AddToCart)
    });
//addwishlist
function addwishlist(event){

            event.preventDefault();
          let urlwishlist = $(this).data('url');
         // alert(urlwishlist);
          $.ajax({
                    type: "GET",
                    url: urlwishlist,
                    dataType: 'json',
                    success: function(data)
                    {
                      if (data.code===200) {
                        Swal.fire({
                    title: 'ADD, Wishlist, Success!.',
                    width: 600,
                    height:600,
                    padding: '3em',
                    background: '#fff url(https://png.pngtree.com/png-vector/20191017/ourlarge/pngtree-hand-gesture-okay-ok-agree-approval-sign-vector-png-image_1805849.jpg)',
                    backdrop: `
                      rgba(0,0,123,0.4)
                      url("https://images.viblo.asia/a87852d0-d60c-4a7c-ae42-0bfb6679ecb3.gif")
                      left top
                      no-repeat
                    `
                  })
                      }
                    },
                    error:function()
                    {

                    }
                });
        }
    $(function(){
       
       $('.add_to_wishlist').on('click',addwishlist)
    });
//update cart

    function cartUpdate(event)
    {
       event.preventDefault();
       let urlUpdate=$(this).data('url');;
       let quantity=$(this).parents('tr').find('input.quantity').val();
       // alert(urlUpdate);
       // alert(id);
       // alert(quantity);
       $.ajax({
        type:"GET",
        url:urlUpdate,
        data:{quantity:quantity},
                    success: function(data)
                    {
                      if (data.code===200) {
                          Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Cập nhật thành công !',
                                    showConfirmButton: false,
                                    timer: 1500
                                  })
                          location.reload();
                      }
                    },
                    error:function()
                    {

                    }

       });
    }
    
    $(function(){
      $('.cart_update').on('click',cartUpdate);
    });

    //delete
    function actionDelete(event)
{
event.preventDefault();
let urlRequest=$(this).data('url');
let that=$(this);

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
      type:'GET',
      url:urlRequest,
      success:function(data)
      {
       if (data.code==200) {
         that.parent().parent().remove();
         Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
          $('.cart_wapper').reload();
       }
       
      },
      error:function()
      {

      }

    });
    
  }
})
}
$(function(){
$(document).on('click','.actionDelete',actionDelete);
});

//chon tỉnh thành phố
// $(document).ready(function(){
  
// });
// trong file esshopper/js/main.js

