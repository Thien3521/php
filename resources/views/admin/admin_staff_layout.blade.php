<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Trang quản lý | Shop - Đồ án chuyên ngành </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/uploads/avatar.jpg') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('public/login/admin/assets/vendor/fonts/boxicons.css') }}" />
    sweetalertcss
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/sweetalertcss.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/login/admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('public/login/admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('public/login/admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('public/login/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('public/login/admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('public/fontend/css/sweetaler.css') }}"> -->
    <!-- Page CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <!-- Helpers -->
    <script src="{{ asset('public/login/admin/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('public/login/admin/assets/js/config.js') }}"></script>
  </head>

  <body>
    
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img class="imageChange" src="{{ asset('public/uploads/avatar.jpg') }}" alt="">
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) "
                        >
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <!-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Gym</span> -->
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class ="menu-item active">
              <a href="{{url('/admin-staff')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Trang chính</div>
              </a>
            </li>
            
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Lịch đặt </span>
            </li>
            

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-perforated" viewBox="0 0 16 16">
  <path d="M4 4.85v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z"/>
  <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Z"/>
</svg> 
                <div data-i18n="Layouts">Lịch đặt</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ url('/all-calendar-booking') }}" class="menu-link">
                    <div data-i18n="Account">Xem lịch đặt</div>
                  </a>
                </li>
             
               
              </ul>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Lịch làm việc</span>
            </li>
            

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ticket-perforated" viewBox="0 0 16 16">
  <path d="M4 4.85v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z"/>
  <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Z"/>
</svg> 
                <div data-i18n="Layouts">lịch làm việc</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ url('/calendar-booking') }}" class="menu-link">
                    <div data-i18n="Account">Xem lịch làm việc</div>
                  </a>
                </li>
              </ul>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ url('/all-calendar') }}" class="menu-link">
                    <div data-i18n="Account">Xem lịch làm việc nhân viên</div>
                  </a>
                </li>
              </ul>
            </li>
         
            
            

        
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->


          <!-- / Navbar -->

          
            <!-- Content -->

            <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    name = "keywords_submit"
                    id   = "keywords"
                    class="form-control border-0 shadow-none"
                    placeholder="Tìm kiếm ..."
                    aria-label="Search..."
                  />
                  <div id = "search-ajax"></div>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <?php 
                  $image = Session::get('image');
                              
                ?>
               

                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                    
                      <img src="{{ asset('/public/login/account.jpg')}}"  alt class="w-px-40  rounded-circle" />
                    </div>
                    
                  </a>
                  
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('/public/login/account.jpg')}}" alt class="w-px-40  rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block" class="username">
                              
                              
                            </span>
                            <small class="text-muted">
                            </small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    
                    <li>
                      <a class="dropdown-item" href="{{URL::to('/admin-account/' )}}">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Trang cá nhân</span>
                      </a>
                    </li>
                    
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Cài đặt</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{url('/admin-logout')}}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Đăng xuất</span>
                      </a>
                    </li>
                  
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

        @yield('content')
        
        <!-- Footer -->
        
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
 
    <!-- / Layout wrapper -->
<script>
                          
  //  $('#datepicker1').datepicker({
  //  uiLibrary: 'bootstrap4'
                                                        
  // });
                                                 
  //   $('#datepicker2').datepicker({
  //   uiLibrary: 'bootstrap4'
  // });
</script>
  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('public/login/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('public/login/admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('public/login/admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/login/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('public/login/admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('public/login/admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('public/login/admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('public/login/admin/assets/js/dashboards-analytics.js') }}"></script>
    <!-- <script src="{{ asset('public/fontend/js/jquery.shopnav.js') }}"></script> -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('public/backend/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/bootstrap.min.js') }}" ></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>



<script>
      $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
  })
  
</script>

  </body>
<script type="text/javascript">
  $(document).ready(function(){
    $('.select-address').change(function(){
        var city_id = $('#city').val();
        var _token = $('input[name="_token"]').val();       
        $.ajax({
            url: '{{ url('/load-basis-spa') }}',
            method: 'POST',
            data: {city_id: city_id, _token: _token},
            success:function(data) {
                $('.load-basis-spa').html(data);
                
            }
        });
    });
});
</script>
  
  <script>
  ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .catch( error => {
            console.error( error );
        } ); 
  ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
       } );
  ClassicEditor
        .create( document.querySelector( '#editor3' ) )
        .catch( error => {
            console.error( error );
       } );  
  ClassicEditor
        .create( document.querySelector( '#editor4' ) )
        .catch( error => {
            console.error( error );
        } );    
</script>
  <style>
    .imageChange {
    max-width: 200px;
    height: auto;
}
  </style>
    <!-- room -->
<script>
     $(document).ready(function(){
      load_room();
    function load_room() {
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: '{{ url('/load-room') }}',
            method: 'get',
            data: {_token:_token},
            success:function(data) {
                $('.load-room').html(data);
                delete_room();
            }
        });
    }

    function delete_room() {
        $('.delete-room').click(function() {
            var room_id = $(this).data('room_id');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{ url('/delete-room') }}',
                method: 'POST',
                data: {room_id:room_id, _token:_token},
                success:function() {
                    load_room();
                    swal({
                        title: "Đã xóa danh mục thành công",
                        text: "Bạn có thể tiếp tục xóa thêm danh mục khác",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    });
                }
            });
        });
    }
    $(document).ready(function(){
    $('.add-room').click(function(){
        var form_data = new FormData($('form')[0]);
        $.ajax({
            url: '{{url('/add-room')}}',
            method: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function(){
              load_room();
                swal({
                    title: "Đã thêm phòng thành công",
                    text: "Bạn có thể tiếp tục thêm phòng khác",
                    showCancelButton: true,
                    cancelButtonText: "Xem tiếp",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Đi đến giỏ hàng",
                    closeOnConfirm: false
                });
            }
        });
    });
});      
});
    </script>
    <!-- end room -->
<script>
  $(document).ready(function(){
    function load_register_staff() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{ url('/load-register-staff') }}',
            method: 'get',
            data: {_token:_token},
            success:function(data) {
                $('.load-register-staff').html(data);
               
            }
        });
    }
    load_register_staff();
 
      $(document).on('click', '.add-register-staff', function () {
            var city = $('#city').val();
            var basis = $('#basis').val();
            var _token = $('input[name="_token"]').val();
          
            $.ajax({
                url: '{{url('/add-register-staff')}}',
                method: 'POST',
                data: {city:city, basis:basis, _token:_token },
                success: function(){
                    // Xử lý sau khi thêm nhân viên thành công
                    load_register_staff();
                   
                    swal({
                        title: "Đã Xác nhận thành công",
                        text: "Bạn có thể tiếp tục ",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                    
                        closeOnConfirm: false
                    });
                    
                }
            });   
        });
  
});
</script>
<!-- send mail -->
<script>
$(document).ready(function(){
    $('#send').on('click', function(){
        var booking_id = $(this).data('booking_id');
        var email = $('#email_user').val();
        var _token = $('input[name="_token"]').val();
      
        $.ajax({
            url: '{{url('/send-mail-booking')}}',
            method: 'get',
            data: {booking_id: booking_id,email:email,_token: _token},
            success: function(response){
                // Hiển thị thông báo AJAX
                swal({
                        title: "Mail đã được gửi thành công!",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        closeOnConfirm: false
                    });
                
            },
            error: function(xhr, status, error){
                // Xử lý lỗi (nếu có)
                swal({
                        title: "Đã xảy ra lỗi khi gửi mail. Có thể mail chưa chính xác",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        closeOnConfirm: false
                    });
            }
        });
    });
}); 
</script>
    <!-- category -->
<script>
     $(document).ready(function(){
    load_category();
    function load_category() {
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: '{{ url('/load-category') }}',
            method: 'get',
            data: {_token:_token},
            success:function(data) {
                $('.load-category').html(data);
                delete_category();
            }
        });
    }

    function delete_category() {
        $('.delete-category').click(function() {
            var category_id = $(this).data('category_id');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{ url('/delete-category') }}',
                method: 'POST',
                data: {category_id:category_id, _token:_token},
                success:function() {
                    load_category();
                    swal({
                        title: "Đã xóa danh mục thành công",
                        text: "Bạn có thể tiếp tục xóa thêm danh mục khác",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    });
                }
            });
        });
    }
    $(document).ready(function(){
    $('.add-category').click(function(){
        var form_data = new FormData($('form')[0]);
        $.ajax({
            url: '{{url('/add-category')}}',
            method: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function(){
              load_category();
                swal({
                    title: "Đã thêm danh mục thành công",
                    text: "Bạn có thể tiếp tục thêm danh mục khác",
                    showCancelButton: true,
                    cancelButtonText: "Xem tiếp",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Đi đến giỏ hàng",
                    closeOnConfirm: false
                });
            }
        });
    });
});      
});
    </script>
    <!-- end category -->
   
    <!-- service -->
    <script>
   $(document).ready(function() {
    function load_service() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{ url('/load-service') }}',
            method: 'get',
            data: {_token: _token},
            success: function(data) {
                $('.load-service').html(data);
                delete_service();
            }
        });
    }

    function delete_service() {
        $('.delete-service').click(function() {
            var service_id = $(this).data('service_id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('/delete-service') }}',
                method: 'POST',
                data: {service_id: service_id, _token: _token},
                success: function() {
                    load_service();
                    swal({
                        title: "Đã xóa thành công",
                        text: "Bạn có thể tiếp tục xóa",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    });
                }
            });
        });
    }

    $('.add-service').click(function() {
        var form_data = new FormData($('form')[0]);
        $.ajax({
            url: '{{ url('/add-service') }}',
            method: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function() {
                load_service();
                swal({
                    title: "Đã thêm danh mục thành công",
                    text: "Bạn có thể tiếp tục thêm danh mục khác",
                    showCancelButton: true,
                    cancelButtonText: "Xem tiếp",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Đi đến giỏ hàng",
                    closeOnConfirm: false
                });
            }
        });
    });

    load_service();
});

</script>

<!-- end-service -->

<!-- combo -->
<script>
    function load_combo() {
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: '{{ url('/load-combo') }}',
            method: 'get',
            data: {_token:_token},
            success:function(data) {
                $('.load-combo').html(data);
                delete_combo();
            }
        });
    }

    function delete_combo() {
        $('.delete-combo').click(function() {
            var combo_id = $(this).data('combo_id');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{ url('/delete-combo') }}',
                method: 'POST',
                data: {combo_id:combo_id, _token:_token},
                success:function() {
                    load_combo();
                    swal({
                        title: "Đã xóa thành công",
                        text: "Bạn có thể tiếp tục xóa ",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    });
                }
            });
        });
    }

    $(document).ready(function(){
        load_combo();

        $('.add-combo').click(function(){
            var category_id = $('#category_id').val();
            var combo_name = $('#combo_name').val();
            var combo_introduce = $('#combo_introduce').val();
            var combo_information = $('#combo_information').val();
            var combo_price = $('#combo_price').val();
            var combo_time = $('#combo_time').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{url('/add-combo')}}',
                method: 'POST',
                data: {category_id:category_id,combo_name: combo_name, combo_introduce: combo_introduce, 
                combo_information: combo_information,combo_price:combo_price,combo_time:combo_time,_token: _token},
                success: function(){
                    load_combo();
                    swal({
                        title: "Đã thêm danh mục thành công",
                        text: "Bạn có thể tiếp tục thêm danh mục khác",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    });
                }
            });
        });
    });
</script>

<!-- end-combo -->
<!-- staff  -->
<script>
   $(document).ready(function() {
    function load_staff() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{ url('/load-staff') }}',
            method: 'get',
            data: {_token: _token},
            success: function(data) {
                $('.load-staff').html(data);
                delete_staff();
            }
        });
    }

    function delete_staff() {
        $('.delete-staff').click(function() {
            var staff_id = $(this).data('staff_id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('/delete-staff') }}',
                method: 'POST',
                data: {staff_id: staff_id, _token: _token},
                success: function() {
                    load_staff();
                    swal({
                        title: "Đã xóa thành công",
                        text: "Bạn có thể tiếp tục xóa",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false
                    });
                }
            });
        });
    }

    $('.add-staff').click(function() {
        var form_data = new FormData($('form')[0]);
        $.ajax({
            url: '{{ url('/add-staff') }}',
            method: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function() {
                load_staff();
                swal({
                    title: "Đã thêm danh mục thành công",
                    text: "Bạn có thể tiếp tục thêm danh mục khác",
                    showCancelButton: true,
                    cancelButtonText: "Xem tiếp",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Đi đến giỏ hàng",
                    closeOnConfirm: false
                });
            }
        });
    });

    load_staff();
});

</script>

<!-- end staff -->
<script>
    $(document).ready(function() {
        // Gắn sự kiện cho nút "Tuần Trước"
        $(document).on('click', '#last-week', function() {
            var lastweek = $(this).data('calendar_date');
            
            var _token = $('input[name="_token"]').val();
            

            $.ajax({
                url: '{{url('/load-lastweek-booking')}}',
                method: 'get',
                data: {lastweek: lastweek, _token: _token },
                success: function(data){
                    $('.load-calendar').html(data);
                    delete_calendar();
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Gắn sự kiện cho nút "Tuần Tiếp Theo"
        $(document).on('click', '#next-week', function() {
            var nextweek = $(this).data('calendar_date');
            var _token = $('input[name="_token"]').val();
            
            $.ajax({
                url: '{{url('/load-nextweek-booking')}}',
                method: 'get',
                data: {nextweek: nextweek, _token: _token },
                success: function(data){
                    $('.load-calendar').html(data);
                    delete_calendar();
                }
            });
        });
    });
</script>
<!-- calendar -->
<script>
  $(document).ready(function(){
    function load_calendar() {
        var _token = $('input[name="_token"]').val();
        var lastweek = $(this).data('calendar_last_week');
        $.ajax({
            url: '{{ url('/load-calendar') }}',
            method: 'get',
            data: {_token:_token,lastweek:lastweek},
            success:function(data) {
                $('.load-calendar').html(data);
               
            }
        });
    }
    load_calendar();
 
      $(document).on('click', '.add-calendar', function () {
            var staff_id = $(this).closest('.modal-content').find('.staff_id').val();
            var calendar_day = $(this).data('calendar_day');
            var calendar_shift = $(this).closest('.modal-content').find('.calendar_shift').val();
            var _token = $('input[name="_token"]').val();
          
            $.ajax({
                url: '{{url('/add-calendar')}}',
                method: 'POST',
                data: {staff_id:staff_id, calendar_day:calendar_day, calendar_shift:calendar_shift, _token:_token },
                success: function(){
                    // Xử lý sau khi thêm nhân viên thành công
                  
                 
                    load_calendar();
                    $('.btn_close').click();
                   
                    
                }
            });   
        });
  
});
</script>
<!-- end-calendar -->

    

 


</html>
