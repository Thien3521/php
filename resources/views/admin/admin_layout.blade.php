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
              <a href="{{url('/admin-dashboard')}}" class="menu-link">
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
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
  <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
</svg>  
                <div data-i18n="Layouts">Lịch đặt</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ url('/all-calendar-booking') }}" class="menu-link">
                    <div data-i18n="Account">Xem lịch đặt</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ url('/revenue') }}" class="menu-link">
                    <div data-i18n="Account">Thống kê</div>
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
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Trải nghiệm của khách hàng</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
  <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
</svg>
                <div data-i18n="Layouts"> Trải nghiệm </div>
              </a>

              <ul class="menu-sub">
               
                <li class="menu-item">
                  <a href="{{ url('all-experience') }}" class="menu-link">
                    <div data-i18n="Notifications">Hiển thị tất cả </div>
                  </a>
                </li>
               
              </ul>
              
            </li>
            
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Cơ sở vật chất / Danh mục</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg>
                <div data-i18n="Layouts"> Phòng / Danh mục </div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ url('/all-room') }}" class="menu-link">
                    <div data-i18n="Account">Hiện thị các phòng</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ url('all-category') }}" class="menu-link">
                    <div data-i18n="Notifications">Hiển thị các danh mục</div>
                  </a>
                </li>
                
               
              </ul>
              
            </li>
            
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Dịch vụ</span>
            </li>
            

            <!-- Layouts -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-menu-button-wide" viewBox="0 0 16 16">
  <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v2A1.5 1.5 0 0 1 14.5 5h-13A1.5 1.5 0 0 1 0 3.5v-2zM1.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-13z"/>
  <path d="M2 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm10.823.323-.396-.396A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
</svg>
                <div data-i18n="Layouts">Các loại dịch vụ</div>
              </a>

              <ul class="menu-sub">
             
                <li class="menu-item">
                  <a href="{{ url('all-endow') }}" class="menu-link">
                    <div data-i18n="Notifications">Hiển thị các endow
                       </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ url('all-service') }}" class="menu-link">
                    <div data-i18n="Notifications">Hiển thị các dịch vụ
                       </div>
                  </a>
                </li>
              </ul>
              
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
  <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
  <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
</svg>
                <div data-i18n="Layouts">Các quy trình</div>
              </a>

              <ul class="menu-sub">
             
                <li class="menu-item">
                  <a href="{{ url('all-tuvan') }}" class="menu-link">
                    <div data-i18n="Notifications">Thêm các quy trình
                       </div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ url('all-tuvan') }}" class="menu-link">
                    <div data-i18n="Notifications">Hiển thị các quy trình
                       </div>
                  </a>
                </li>
              </ul>
              
            </li>
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Tài khoản / Quản lý & Người dùng</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-bookmark" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
</svg>
                <div data-i18n="Layouts"> Tài khoản </div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ url('/all-account-admin') }}" class="menu-link">
                    <div data-i18n="Account">Hiện thị các tài khoản của quản lý</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ url('all-category') }}" class="menu-link">
                    <div data-i18n="Notifications">Hiện thị các tài khoản của người dùng</div>
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
                    <?php $admin_id = Session::get('admin_id')?>
                    @if($admin_id == 6)
                      <a class="dropdown-item" href="{{URL::to('/admin-account/' )}}">
                        <i class="bx bx-user me-2"></i>
                       
                            <span class="align-middle">Thêm Cơ sở</span>
                        
                      </a>
                    @endif
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
                          <span class="flex-grow-1 align-middle">Thông báo</span>
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

  <script>
  ClassicEditor
        .create( document.querySelector( '#service_describe' ) )
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
          },
          error: function(xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            swal({
              title: "Đã xảy ra lỗi. Đã có đơn đăng đặt dịch vụ này",
              text: errorMessage,
              type: "Đã có đơn đăng đặt dịch vụ này"
            });
          }
        });
      });
    }

    $('.add-service').click(function() {
      var form_data = new FormData($('form#add-service-form')[0]);
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
    $('.edit-service').click(function() {
        var form_data = new FormData($('form#edit-service-form')[0]);
        var service_id = $(this).data('service_id');
        form_data.append('service_id', service_id); // Append service_id to the form data
        $.ajax({
            url: '{{ url('/edit-service') }}',
            method: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function() {
                load_service();
                swal({
                    title: "Đã cập nhật danh mục thành công", // Update success message
                    text: "Bạn có thể tiếp tục thay đổi danh mục khác", // Update success message
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

<!-- endow -->
<script>
    function load_endow() {
        var _token = $('input[name="_token"]').val();

        $.ajax({
            url: '{{ url('/load-endow') }}',
            method: 'get',
            data: {_token:_token},
            success:function(data) {
                $('.load-endow').html(data);
                delete_endow();
            }
        });
    }

    function delete_endow() {
        $('.delete-endow').click(function() {
            var endow_id = $(this).data('endow_id');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{ url('/delete-endow') }}',
                method: 'POST',
                data: {endow_id:endow_id, _token:_token},
                success:function() {
                    load_endow();
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
        load_endow();

        $('.add-endow').click(function() {
          var endow_name = $('#endow_name').val();
          var endow_image = $('#endow_image')[0].files[0]; // Lấy tệp hình ảnh từ input
          var endow_information = $('#endow_information').val();
          var category_id = $('#category_id').val();
          var endow_code = $('#endow_code').val();
          var endow = $('#endow').val();
          var endow_day_begin = $('#endow_day_begin').val();
          var endow_day_end = $('#endow_day_end').val();
          var _token = $('input[name="_token"]').val();

          var form_data = new FormData(); // Tạo đối tượng FormData
          form_data.append('endow_name', endow_name);
          form_data.append('endow_image', endow_image);
          form_data.append('category_id', category_id);
          form_data.append('endow_information', endow_information);
          form_data.append('endow_code', endow_code);
          form_data.append('endow', endow);
          form_data.append('endow_day_begin', endow_day_begin);
          form_data.append('endow_day_end', endow_day_end);
          form_data.append('_token', _token);

          $.ajax({
              url: '{{ url('/add-endow') }}',
              method: 'POST',
              data: form_data, // Sử dụng đối tượng FormData
              processData: false,
              contentType: false,
              success: function() {
                  load_endow();
                  swal({
                      title: "Đã thêm thành công",
                      text: "Bạn có thể tiếp tục thêm ",
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
<!-- end-endow -->
<!-- staff  -->
<script>
   $(document).ready(function() {
    function load_experience() {
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{ url('/load-experience') }}',
            method: 'get',
            data: {_token: _token},
            success: function(data) {
                $('.load-experience').html(data);
                delete_experience();
            }
        });
    }

    function delete_experience() {
        $('.delete-experience').click(function() {
            var experience_id = $(this).data('experience_id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('/delete-experience') }}',
                method: 'POST',
                data: {experience_id: experience_id, _token: _token},
                success: function() {
                    load_experience();
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

    $('.add-experience').click(function() {
        var form_data = new FormData($('form')[0]);
      
        $.ajax({
            url: '{{ url('/add-experience') }}',
            method: 'POST',
            data: form_data,
            processData: false,
            contentType: false,
            success: function() {
                load_experience();
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

    load_experience();
});

</script>

<!-- end experience -->
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
                    // load_calendar();
                    swal({
                    title: "Đã thêm thành công",
                    text: "Bạn có thể tiếp tục thêm khác",
                    showCancelButton: true,
                    cancelButtonText: "Xem tiếp",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "",
                    closeOnConfirm: false
                });
                      
                }
            });   
        });
  
});
</script>
<!-- end-calendar -->

 <!-- Address -->
 <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        }); 
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('Làm ơn chọn để tính phí vận chuyển');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                       location.reload(); 
                    }
                    });
                } 
        });
    });
  </script>
    
  <script type="text/javascript">
        $(document).ready(function(){
            $('.save-admin-information').click(function(){
              var form_data = new FormData($('form')[0]);
        $.ajax({
    url: '{{ url('/add-information-account') }}',
    method: 'POST',
    data: form_data,
    processData: false,
    contentType: false,
    success: function() {
                
                swal({
                    title: "Đã thêm cơ sở thành công",
                    text: "Bạn có thể tiếp tục thêm khác",
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
 

<script type="text/javascript">
  
   $(document).ready(function(){
    chart60day();
    //Biểu đồ
    var chart =  new Morris.Bar({
        parseTime: false,
        element: 'chart',
        xkey: 'order_date',
        ykeys: ['total_order','revenue','quantity'],
        labels: ['Don hang','loi nhuan','so luong']
        });
    // Loc 30 ngày
    function chart60day(){
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:'{{url('/chart-day')}}',
        method: "POST",
        dataType:"JSON",
        data:{_token:_token},
        success:function(data){
          chart.setData(data);
          
        }
      })
    }
    
    // select
    $('.dashboard-filter').click(function(){
     var dashboard_value = $(this).val();
     var _token = $('input[name="_token"]').val();
     
        $.ajax({
          url: '{{url('/dashboard-filter')}}',
          method: 'POST',
          dataType: "JSON",
          data:{dashboard_value:dashboard_value,_token:_token},
          success:function(data){
            chart.setData(data.chart_data);
             $('.load-revenue').html(data.all_revenue);

          }            
        });
                          
     });
    //Lọc
    $('#search').click(function(){
     var date1 = $('#datepicker1').val();
     var date2 = $('#datepicker2').val();
     var _token = $('input[name="_token"]').val();
        $.ajax({
          url: '{{url('/search-order-revenue')}}',
          method: 'POST',
          dataType: "JSON",
          data:{date1:date1,date2:date2,_token:_token},
          success:function(data){
            chart.setData(data.chart_data);
             $('.load-revenue').html(data.all_revenue);
          
          }            
        });
                          
     });
    });

</script>
</html>
