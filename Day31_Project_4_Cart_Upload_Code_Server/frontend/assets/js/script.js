//frontend/assets/js/script.js
$(document).ready(function() {
   // alert("hello");

   // Ctrl + Shift + R để tải lại trang và xóa cache trình duyệt
   $('.add-to-cart').click(function() {
       // Lấy ra id của sp vừa click
       var product_id = $(this).attr('data-id');
       // Gọi ajax lên PHP để nhờ PHP thêm sp hiện tại vào giỏ hàng
       $.ajax({
           // Url MVC xử lý ajax
           url: 'index.php?controller=cart&action=add',
           // Phương thức truyền dữ liệu
           method: 'GET',
           // Dữ liệu gửi kèm từ ajax lên PHP
           data: {
               product_id: product_id
           },
           // Nơi nhận dữ liệu trả về từ PHP
           success: function(data) {
               // console.log(data);
               $('.ajax-message').html('Thêm sản phẩm vào giỏ hàng thành công')
               $('.ajax-message').addClass('ajax-message-active');

               //Set thời gian timeout để auto ẩn message trên sau 3 giây
               setTimeout(function() {
                   $('.ajax-message').removeClass('ajax-message-active');
               }, 3000);
               // Xử lý update số lượng sp của icon giỏ hàng
               var amount = $('.cart-amount').text();
               amount++;
               $('.cart-amount').text(amount);
           }
       });
   })
});