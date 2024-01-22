<!--
=========================================================
* Argon Dashboard 2 - v2.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png"> -->
  <title>
   New Day Spa - Dịch vụ đặt lịch spa online 
  </title>
  <!--     Fonts and icons     -->
  
  <link href="{{ asset('public/fontend/assets/css/family.css') }}" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('public/fontend/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('public/fontend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
<link href="{{ asset('public/fontend/assets/css/app.css') }}" rel="stylesheet" />
<link href="{{ asset('public/fontend/assets/css/vendor.css') }}" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="{{ asset('public/fontend/assets/js/fontawesome.js') }}" crossorigin="anonymous"></script>
<link href="{{ asset('public/fontend/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
<!-- CSS Files -->
<link  href="{{ asset('public/fontend/assets/css/argon-dashboard.css') }}" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('public/backend/css/sweetalertcss.css') }}" />

</head>

<body class="">

  <div class="container position-sticky z-index-sticky top-0">
    <div class="row nav_show_hidden">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
              NEW DAY SPA
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{url('home')}}">
                    
                    Trang chủ
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="{{url('introduce')}}">
                   
                    Giới thiệu
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-up.html">
                    
                    Tin tức
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-in.html">
                    
                    Liên hệ
                  </a>
                </li>
                
              </ul>
              <div class="col-md-2 load-login">
                
              </div>
            
            </div>
         
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <div class="buy-now">
    <button class="btn btn-danger btn-buy-now" id="show-chat-button" onclick="toggleChatForm()">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
  <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2"/>
</svg></button>

        <div class="chat-window" id="chat-window">
        <!-- Content of the chat window -->
        </div>
      
    </div>
    @csrf

 @yield('content')
 
    <!--====== End - Section 1 ======-->
        <!--====== Main Footer ======-->
        <footer>
            <div class="outer-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">

                                <span class="outer-footer__content-title">Trung tâm hành chính</span>
                                <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>

                                    <span>120 Trần đại nghĩa Đà nẵng VN</span></div>
                                <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

                                    <span>(+0) 86546342</span></div>
                                <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

                                    <span>hnqui.19it6@vku.udn.vn</span></div>
                                <div class="outer-footer__social">
                                    <ul>
                                        <li>

                                            <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li>

                                            <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li>

                                            <a class="s-youtube--color-hover" href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li>

                                            <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li>

                                            <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">

                                        <span class="outer-footer__content-title">Thông tin</span>
                                        <div class="outer-footer__list-wrap">
                                            <ul>
                                                <li>

                                                    <a href="cart.html">Phụ kiện </a></li>
                                                <li>

                                                    <a href="dashboard.html">Áo quần </a></li>
                                                <li>

                                                    <a href="shop-side-version-2.html">Đồ gia dụng</a></li>
                                                <li>

                                                    <a href="dash-payment-option.html">Du lịch </a></li>
                                                <li>

                                                    <a href="shop-side-version-2.html">Thể thao</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">
                                        <div class="outer-footer__list-wrap">

                                            <span class="outer-footer__content-title">Các công ty liên kết </span>
                                            <ul>
                                                <li>

                                                    <a href="about.html">Shop mail</a></li>
                                                <li>

                                                    <a href="contact.html">Store Q</a></li>
                                                <li>

                                                    <a href="index.html">Store T</a></li>
                                                <li>

                                                    <a href="dash-my-order.html">Store t&q</a></li>
                                                <li>

                                                    <a href="shop-side-version-2.html">Store</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="outer-footer__content">

                                <span class="outer-footer__content-title">Gửi thông điệp</span>
                                <form class="newsletter">
                                    <div class="u-s-m-b-15">
                                        <div class="radio-box newsletter__radio">

                                            <input type="radio" id="male" name="gender">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="male">Nam</label></div>
                                        </div>
                                        <div class="radio-box newsletter__radio">

                                            <input type="radio" id="female" name="gender">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="female">Nữ</label></div>
                                        </div>
                                    </div>


                                    <span class="newsletter__text"> Chúc bạn một ngày tốt lành</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lower-footer__content">
                                <div class="lower-footer__copyright">

                                    <span>Copyright © 2018</span>

                                    <a href="index.html">Reshop</a>

                                    <span>All Right Reserved</span></div>
                                <div class="lower-footer__payment">
                                    <ul>
                                        <li><i class="fab fa-cc-stripe"></i></li>
                                        <li><i class="fab fa-cc-paypal"></i></li>
                                        <li><i class="fab fa-cc-mastercard"></i></li>
                                        <li><i class="fab fa-cc-visa"></i></li>
                                        <li><i class="fab fa-cc-discover"></i></li>
                                        <li><i class="fab fa-cc-amex"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
  <!--   Core JS Files   -->
  
<script src="{{ asset('public/fontend/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/fontend/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('public/fontend/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('public/fontend/assets/js/js/app.js') }}"></script>
<script src="{{ asset('public/fontend/assets/js/js/jquery.shopnav.js') }}"></script>
<script src="{{ asset('public/fontend/assets/js/js/vendor.js') }}"></script>

<script src="{{ asset('public/backend/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('public/backend/js/bootstrap.min.js') }}" ></script>

<script>
    $('.owl-carousel').owlCarousel({
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: true,
  loop: true,
  margin: 50,
  responsiveClass: true,
  nav: true,
  loop: true,
  stagePadding: 100,
  responsive: {
    0: {
      items: 1
    },
    568: {
      items: 2
    },
    600: {
      items: 3
    },
    1000: {
      items: 3
    }
  }
})
$(document).ready(function() {
  $('.popup-youtube').magnificPopup({
    disableOn: 320,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: true
  });
});
$('.item').magnificPopup({
  delegate: 'a',
});
</script>
<script>
    var position = $(window).scrollTop(); 
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > position) {
            console.log('scrollDown');
            $('.nav_show_hidden').fadeOut(1000);
            
        } else {
            console.log('scrollUp');
            $('.nav_show_hidden').fadeIn(1000);
            $( ".navbar" ).addClass( "blur" )
        }
        position = scroll;
    });
</script>
<script>
 $(document).ready(function() {
  
    $(document).on('click', '.plus', function() {
        var service_id = $(this).data('service_id');
        var countInput = $('.count_' + service_id);
        countInput.val(parseInt(countInput.val()) + 1);
    });
    
    $(document).on('click', '.minus', function() {
        var service_id = $(this).data('service_id');
        var countInput = $('.count_' + service_id);
        if (parseInt(countInput.val()) > 1) {
            countInput.val(parseInt(countInput.val()) - 1);
        }
    });

    $('.count').prop('disabled', true);
});


</script>
<script>
    // Add JavaScript functionality to the toggle icon
    document.querySelectorAll('.toggle-icon').forEach(function(icon) {
        icon.addEventListener('click', function() {
            icon.classList.toggle('is-expanded'); // Toggle the is-expanded class on click
            // Implement logic to expand/collapse the associated list here
            var associatedList = icon.nextElementSibling;
            if (associatedList.style.display === "block") {
                associatedList.style.display = "none"; // Collapse the associated list
            } else {
                associatedList.style.display = "block"; // Expand the associated list
            }
        });
    });
  
</script>
<script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('public/fontend/assets/js/argon-dashboard.min.js?v=2.0.4') }}.."></script>
</body>
<!-- <script>
  $(document).ready(function(){
    $('.service-detail').click(function(){
      var service_id = $(this).data('service_id');
      var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{url('/service-detail')}}',
            method: 'POST',
            data: {service_id:service_id,_token:_token},
            success: function(data){
            
              
            }
        });
    });
});     
</script> -->
<!-- load-comment -->
<script>
    load_comment();
    // Đảm bảo rằng hàm load_comment đã được khai báo trước khi được gọi
    function load_comment() {
        var _token = $('input[name="_token"]').val();
        var admin_information_id = $('#admin_information_id').val();
        $.ajax({
            url: '{{ url('/load-comment') }}',
            method: 'get',
            data: {_token: _token,admin_information_id:admin_information_id},
            success: function(data) {
                $('.load-comment').html(data);
                
            }
        });
    }

    // Gọi hàm load_comment
    $(document).ready(function () {
        load_comment();
    });
</script>

<!-- add comment -->
<script >
  $(document).ready(function(){
    $('.add-comment').click(function(){
        var admin_information_id = $(this).data('admin_information_id');
        var comment = $('#comment').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{ url('/add-comment') }}',
            method: 'POST',
            data: {admin_information_id: admin_information_id,comment:comment, _token: _token},
            success:function() {
                load_comment();
                swal({
                        title: "Bình luận thành công",
                        text: "Bạn có thể tiếp tục bình luận khác",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    });
            },
            error: function() {
                swal({
                    title: "Cần phải nhập thông tin bình luận hoặc bạn cần phải đăng nhập",
                    text: "Vui lòng đăng nhập để tiếp tục",
                    type: "error"
                });
                }
        });
    });
});
</script>
<!-- load-login -->
<script >
    load_login();
   function load_login() {
    var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{ url('/load-login') }}',
            method: 'get',
            data:{_token:_token} ,
            success:function(data) {
                $('.load-login').html(data);
               
            }
        });
    }
</script>

<!-- end load-login -->
<script>
    // Xử lý sự kiện khi form đăng ký được submit
    $('form.l-f-o__form').submit(function(event) {
        event.preventDefault(); // Ngăn chặn form submit mặc định
        var form = $(this);
        var url = form.attr('action');
        var formData = form.serialize(); // Gom dữ liệu từ form

        // Gửi request đến server bằng Ajax
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            success: function(response) {
                if (response.message_email) {
                    // Hiển thị thông báo lỗi trong modal
                    var alertDiv = '<div class="alert alert-danger">' + response.message_email + '</div>';
                    $('.modal-body').prepend(alertDiv);

                } else if (response.message_password) {
                    // Hiển thị thông báo lỗi trong modal
                    var alertDiv = '<div class="alert alert-danger">' + response.message_password + '</div>';
                    $('.modal-body').prepend(alertDiv);

                }else if (response.redirect_url) {
            // Chuyển hướng người dùng đến trang "home"
            window.location.href = response.redirect_url;
                }
            }
        });
    });
</script>


<!-- login  -->
<script type="text/javascript">
  $(document).ready(function(){
    $('.select-address').change(function(){
        var city_id = $('#city').val();
        var _token = $('input[name="_token"]').val();       
        $.ajax({
            url: '{{ url('/load-basis') }}',
            method: 'POST',
            data: {city_id: city_id, _token: _token},
            success:function(data) {
                $('.load-basis').html(data);
                
            }
        });
    });
});
</script>

<script type="text/javascript">
  
  $(document).ready(function (){
    $('.booking-service').click(function (){
        var service_id =  $(this).data('service_id');
        var qty =  $('.qty').val();
        var _token = $('input[name="_token"]').val();     
        $.ajax({
            url: '{{ url('/booking-service-b1') }}',
            method: 'POST',
            data: {service_id: service_id, _token: _token},
            success:function(data) {
                $('#booking').html(data);
                // Xóa modal đã tồn tại từ DOM
                $('.modal').remove();
                
                // Thêm nội dung modal mới vào body
                $('body').append(data);

                // Hiển thị modal
                $('#modal').modal('show');
                
                // Sự kiện khi nhấn nút đóng trong modal
                $('.modal').on('click', '[data-dismiss="modal"]', function() {
                    $('#modal').modal('hide');
                });

                // Sự kiện khi modal đã được đóng
                $('#modal').on('hidden.bs.modal', function () {
                    $(this).remove(); // Remove the modal from the DOM after it's closed
                });

            // $('.time').change(function(){
            //     var service_id =  $(this).data('service_id');
            //     var date = $('#date').val(); 
            //     var time = $('#time').val(); 
                
            //     var _token = $('input[name="_token"]').val();       
            //     $.ajax({
            //         url: '{{ url('/load-slot-day') }}',
            //         method: 'POST',
            //         data: {service_id:service_id,date: date,time:time, _token: _token},
            //         success:function(data) {
            //             $('.load-slot').html(data);
            //         }
            //     });
            // });
            // $('.date').change(function(){
            //     var service_id =  $(this).data('service_id');
            //     var date = $('#date').val(); 
            //     var time = $('#time').val(); 
                
            //     var _token = $('input[name="_token"]').val();       
            //     $.ajax({
            //         url: '{{ url('/load-slot-day') }}',
            //         method: 'POST',
            //         data: {service_id:service_id,date: date,time:time, _token: _token},
            //         success:function(data) {
            //             $('.load-slot').html(data);
            //         }
            //     });
            // });

            function load_staff_booking() {
              var staff_id = $('#staff_id').val();
              var _token = $('input[name="_token"]').val();
              $.ajax({
                  url: '{{ url('/select-staff') }}',
                  method: 'get',
                  data: {_token: _token, staff_id: staff_id},
                  success: function(data) {
                      $('.load-date').html(data);
                      
                  }
              });
          }
          
              // Call the load_staff_booking function on click
              $(document).on('click', '.select-staff', function() {
                  load_staff_booking();
              });
              $(document).on('click', '.check-staff', function() {
                var _token = $('input[name="_token"]').val();
                var calendar_day = $(this).data('check_radio');
                var staff_id = $('#staff_id').val();
                
                $.ajax({
                      url: '{{ url('/check-radio-date') }}',
                      method: 'get',
                      data: {_token: _token, calendar_day: calendar_day,staff_id:staff_id},
                      success: function(data) {
                          $('#load-hour').html(data);
                          
                      }
                  });
              });  
            //booking
            
            $('.booking').click(function(){
                var date = $('.date:checked + label').text(); // Lấy nội dung của label liền kề input radio ngày được chọn
                var time = $('.time:checked + label').text(); // Lấy nội dung của label liền kề input radio thời gian được chọn
                var code = $('#code').val(); 
                var service_price = $('#service_price').val(); 
                var service_id = $(this).data('service_id');
                var service_name = $('#service_name').val(); 
                var service_address = $('#service_address').val(); 
                var service_image = $('#service_image').val(); 
                var service_information = $('#service_information').val(); 
                var user_id = $('#user_id').val(); 
                var booking_quantity = $('#booking_quantity').val(); 
                var booking_user_name = $('#booking_user_name').val(); 
                var booking_user_email = $('#booking_user_email').val(); 
                var booking_user_phone = $('#booking_user_phone').val(); 
                var booking_user_note = $('#booking_user_note').val(); 
                var admin_service_name = $('#admin_service_name').val();
                var _token = $('input[name="_token"]').val();   
               
                $.ajax({
                url: '{{ url('/load-booking') }}',
                method: 'POST',
                data: {date: date,
                    time:time,
                    code: code,
                    service_price:service_price,
                    service_id: service_id,
                    service_name:service_name,
                    service_address: service_address,
                    admin_service_name:admin_service_name,
                    service_image:service_image, 
                    service_information: service_information,
                    user_id:user_id, 
                    booking_user_name: booking_user_name,
                    booking_user_email:booking_user_email, 
                    booking_user_phone: booking_user_phone,
                    booking_quantity:booking_quantity,
                    booking_user_note:booking_user_note,
                      _token: _token},
                success:function() {
                    swal({
                        title: "Đã đặt lịch thành công",
                        text: "Bạn có thể tiếp tục đặt lịch khác",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    });
                
            }
        });
    });

            // end booking


                
            }
        });
    });
});

</script>

<!-- load cart booking -->

<!-- end load cart booking -->


<!-- end booking -->
<!-- quatity -->


 <!-- show chat -->
<script>
function toggleChatForm() {
  var showChatButton = document.getElementById('show-chat-button');
  showChatButton.style.display = 'none';

  var chatWindow = document.getElementById('chat-window');
  chatWindow.innerHTML = `
  <div class="chat-container">
    <div class="chat-header">
      <img src="{{ asset('/public/login/account.jpg')}}" alt="User Avatar" class="user-avatar">
      <span>User Name</span>
      <button class=close onclick="closeChat()">X</button>
    </div>
    <div class="chat-body" id="chat-body">
      <div class="container">
        <div class="row">
          <div class="col-2">
            <img src="{{ asset('/public/login/account.jpg')}}" alt="User Avatar" class="user-avatar">
          </div>
          <div class="col-10 left-to-right-text bottom-margin">
            sssssssss tôi là người con xứ huế mọng mơ 
          </div>
        </div>
        <div class="row">
        <div class="col-4">
            
          </div>

          <div class="col-8 right-to-left-text bottom-margin">
            tôi là người con xứ huế mọng mơ 
          </div>
        </div>
      </div>
    </div>
    <div class="chat-footer">
  
    <label for="fileUpload" style="cursor: pointer;">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
  <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
  <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10"/>
</svg>
</label>
<input type="file" id="fileUpload" style="display: none;">

      <input type="text" id="message-input" placeholder="Aa">
      <button onclick="sendMessage()"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
  <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
</svg></button>
    </div>
  </div>
  `;
}
function closeChat() {
  var showChatButton = document.getElementById('show-chat-button');
  showChatButton.style.display = 'block';

  var chatWindow = document.getElementById('chat-window');
  chatWindow.innerHTML = '';
}
  

</script>

<style>
#message-input{
    border-radius: 20px; /* Bo tròn viền */
}
.bottom-margin {
  margin-bottom: 10px; /* Đặt khoảng cách giữa các cột */
}

    .right-to-left-text {
  text-align: right; /* Căn lề văn bản sang bên trái */
  white-space: normal;
  padding: 10px; /* Tạo khoảng cách giữa nội dung và background */
  background-color: #22f514; /* Màu background */
  border-radius: 20px; /* Bo tròn viền */
}
.left-to-right-text {
  
  text-align: left; /* Căn lề văn bản sang bên trái */
  white-space: normal;
  padding: 10px; /* Tạo khoảng cách giữa nội dung và background */
  background-color: #ccdacb; /* Màu background */
  border-radius: 20px; /* Bo tròn viền */
}
  .image-container {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.image-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
body {
    /* background-color: #eeeeee; Chỉ định màu nền cho body */
  }
  .shop-p__pagination,
  .shop-p__meta-wrap,
 .product-m,
  .card,
  .card-plain,
  .card-header,
  .card-footer,
  .card-body,
  .form-group,
  .form-control-lg,
  .shop-w-master,
  .form-control {
    background-color: #fff; /* Chỉ định màu nền trắng cho các phần tử */
  }
  .app-content{
    padding-top: 20px;
  }
  .mini-cart-shop-link > .total-item-round {
      top: 0px;
      left: 15px; }
.list-style-type{
  list-style-type: none;
  
}
.buy-now .btn-buy-now {
    position: fixed;
    bottom: 3rem;
    right: 1.625rem;
    z-index: 999999;
    box-shadow: 0 1px 20px 1px #ff3e1d;
}
  /* chat  */
  .chat-window {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 350px;
  background-color: #f4f4f4;
  border-radius: 10px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.chat-header {
  display: flex;
  align-items: center;
  padding: 10px;
  background-color: #0084ff;
  color: #ffffff;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.chat-header img {
  width: 40px;
  height: 40px;
  border-radius: 20px;
  margin-right: 10px;
}

.chat-header span {
  flex-grow: 1;
}

.close {
  padding: 5px 10px;
  background-color: #ffffff;
  color: #0084ff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.close:hover {
  background-color: #f4f4f4;
}

.chat-body {
  height: 350px;
  padding: 10px;
  overflow-y: scroll;
}

.chat-footer {
  display: flex;
  align-items: center;
  padding: 10px;
  background-color: #ffffff;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.chat-footer input[type="text"] {
  flex-grow: 1;
  border-radius: 5px;
  padding: 10px;
  border: 1px solid #ccc;
}

.chat-footer button {
  padding: 10px 15px;
  background-color: #0084ff;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  margin-left: 10px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.chat-footer button:hover {
  background-color: #0069d9;
}

.chat-message {
  display: flex;
  margin-bottom: 10px;
}

.chat-message img {
  width: 30px;
  height: 30px;
  border-radius: 15px;
  margin-right: 10px;
}

.chat-message .message-text {
  background-color: #ffffff;
  border-radius: 10px;
  padding: 10px;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  max-width: 200px;
}

.chat-message .message-text:last-child {
  margin-right: 0;
}
.chat-window {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 350px;
  max-height: calc(100vh - 40px); /* Đảm bảo form không bị quá cao khi màn hình nhỏ */
  overflow-y: auto; /* Cho phép cuộn nếu nội dung vượt quá chiều cao tối đa */
  z-index: 100; /* Đảm bảo form hiển thị trên các phần tử khác */
  background-color: #f4f4f4;
  border-radius: 10px;
  box-shadow: 0px 2px 5px rgba(0,0, 0, 0.1);
}
.user-avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
}







</style>
</html>