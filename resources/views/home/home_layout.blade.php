<!DOCTYPE html>
<html lang="en">
<head>

        <title>Spa PuPu - Spa Làm đẹp</title>
        

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=PT+Serif:wght@400;700&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('public/fontend/user/lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/fontend/user/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('public/fontend/user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('public/fontend/user/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('public/fontend/user/css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('public/backend/css/sweetalertcss.css') }}" />
       
    </head>
<body>
    
        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid sticky-top px-0">
            <div class="container-fluid d-none d-lg-block ">
                <div class="container px-0">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="d-flex flex-wrap">
                                <a href="#" class="me-4 text-lights"><i class="fas fa-map-marker-alt text-primary me-2"></i>Đà nẵng</a>
                                <a href="#" class="me-4 text-lights"><i class="fas fa-phone-alt text-primary me-2"></i>+0386546342</a>
                                <a href="#" class="text-lights"><i class="fas fa-envelope text-primary me-2"></i>hnqui.19it6@vku.udn.vn</a>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="#" class="me-3 btn-square border rounded-circle nav-fill"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="me-3 btn-square border rounded-circle nav-fill"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="me-3 btn-square border rounded-circle nav-fill"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="btn-square border rounded-circle nav-fill"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid bg-light">
                <div class="container px-0">
                    <nav class="navbar navbar-light navbar-expand-xl">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="text-primary display-4">Spa PuPu</h1>
                        </a>
                        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                            <span class="fa fa-bars text-primary"></span>
                        </button>
                        <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                            <div class="navbar-nav mx-auto border-top">
                                <a href="{{url('home')}}" class="nav-item nav-link active">Trang chủ</a>
                                <a href="{{url('introduce')}}" class="nav-item nav-link">Giới thiệu</a>
                                <a href="service.html" class="nav-item nav-link">Dịch vụ</a>
                                <a href="price.html" class="nav-item nav-link">Liên hệ  </a>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap pt-xl-0">
                                <button class="btn-search btn btn-primary btn-primary-outline-0 rounded-circle btn-lg-square" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                                
                                <button type="button" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-4 ms-4" data-bs-toggle="modal" data-bs-target="#booknow">
                                Đặt Ngay
                                </button>
                            </div>
                            <div class="col-md-2 load-login">
                
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar End -->
       
        <!-- Modal booknow-->
    <div class="modal fade" id="booknow" tabindex="-1" aria-labelledby="booknowLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" >
            <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 <!-- Gallery Start -->
                <div class="container-fluid gallery py-5">
                        <div class="container py-5">
                            <div class="text-center mx-auto mb-5" style="max-width: 800px;">
                                <h1 class="display-4 mb-4">Chọn địa chỉ bạn muốn đến</h1>
                            </div>
                            <div class="tab-class text-center">
                                <?php 
                                    $data = DB::table('tbl_tinhthanhpho')->get();
                                ?>
                                @csrf
                                    <select id="city"  name="city" class="form-select form-select-lg mb-3 select-address" aria-label=".form-select-lg example">
                                    @foreach($data as $datas)
                                    <option value="{{$datas->matp}}" >{{$datas->name_city}}            
                                    </option>                
                                    @endforeach
                                </select>
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="row g-4">
                                        <div class="load-basis"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <!-- gallery End -->
            </div>
           
            </div>
        </div>
        </div>
        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->
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
        @yield('content')

        
        <!-- Footer Start -->
        <div class="container-fluid footer py-5">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="mb-4 text-white">Spa PuPu</h4>
                            <p class="text-white">Chúng tôi chuyên cung cấp các dịch vụ chất lượng và chuyên nghiệp đến cho khách hàng.</p>
                            <div class="position-relative mx-auto rounded-pill">
                                <input class="form-control rounded-pill border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Nhập nội dung">
                                <button type="button" class="btn btn-primary btn-primary-outline-0 rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">Gửi</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Dịch vụ</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Chăm sóc da</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Trị liệu</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Chăm sóc tóc</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Massage </a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Tắm trắng</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i>Và rất nhiều dịch vụ khác</a>
                            
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Hoạt động</h4>
                            <p class="text-muted mb-0">Thứ 2: <span class="text-white"> 08:00 am – 10:00 pm</span></p>
                            <p class="text-muted mb-0">Thứ 3: <span class="text-white"> 08:00 am – 10:00 pm</span></p>
                            <p class="text-muted mb-0">Thứ 4: <span class="text-white"> 08:00 am – 10:00 pm</span></p>
                            <p class="text-muted mb-0">Thứ 5: <span class="text-white"> 08:00 am – 10:00 pm</span></p>
                            <p class="text-muted mb-0">Thứ 6: <span class="text-white"> 08:00 am – 10:00 pm</span></p>
                            <p class="text-muted mb-0">Thứ 7: <span class="text-white"> 08:00 am – 10:00 pm</span></p>
                            <p class="text-muted mb-0">Chủ nhật: <span class="text-white"> 8:00 am –10:00 pm</span></p>
                            <h4 class="my-4 text-white">Địa chỉ</h4>
                            <p class="mb-0"><i class="fas fa-map-marker-alt text-secondary me-2"></i> Các thành phố lớn của Việt Nam</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item d-flex flex-column">
                            <h4 class="mb-4 text-white">Các trang liên hệ</h4>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Faceboock</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Instagram</a>
                            <a href=""><i class="fas fa-angle-right me-2"></i> Twitter</a>
                            <h4 class="my-4 text-white">Gửi về địa chỉ</h4>
                            <p class="mb-0"><i class="fas fa-envelope text-secondary me-2"></i> hnqui@gmail.com</p>
                            <p class="mb-0"><i class="fas fa-phone text-secondary me-2"></i> (+84) 3865 463 42</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->



        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-4 text-center text-md-start mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Spa PuPu</a></span>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center">
                            <a href="" class="btn btn-light btn-light-outline-0 btn-sm-square rounded-circle me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="" class="btn btn-light btn-light-outline-0 btn-sm-square rounded-circle me-2"><i class="fab fa-twitter"></i></a>
                            <a href="" class="btn btn-light btn-light-outline-0 btn-sm-square rounded-circle me-2"><i class="fab fa-instagram"></i></a>
                            <a href="" class="btn btn-light btn-light-outline-0 btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        <a class="border-bottom" href="https://htmlcodex.com"></a> Đường link <a class="border-bottom" href="https://themewagon.com">SpaPuPu.com.vn</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



      

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/fontend/user/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('public/fontend/user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('public/fontend/user/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('public/fontend/user/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('public/fontend/user/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('public/fontend/user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/sweetalert.min.js') }}"></script>

 <!-- show chat -->
 <script>
function toggleChatForm() {
  var showChatButton = document.getElementById('show-chat-button');
  showChatButton.style.display = 'none';

  var chatWindow = document.getElementById('chat-window');
  chatWindow.innerHTML = `
  <div class="chat-container">
    <div class="chat-header">
      <img src="https://static.vecteezy.com/system/resources/previews/021/303/384/original/chatbot-icon-cute-smiling-robot-cartoon-character-illustration-png.png" alt="User Avatar" class="user-avatar">
      <span>User Name</span>
      <button class=close onclick="closeChat()">X</button>
    </div>
    <div class="chat-body" id="chat-body">
    <div class="container">
        <div class="row ">
          <div class="col-2">
            <img src="https://static.vecteezy.com/system/resources/previews/021/303/384/original/chatbot-icon-cute-smiling-robot-cartoon-character-illustration-png.png" alt="User Avatar" class="user-avatar">
          </div>
          <div class="col-10 left-to-right-text bottom-margin" >
          <p>Xin Chào 👋<br>Tôi là trợ lý của Spa PuPu, tôi có thể giúp gì cho bạn?</p>
          </div>
        </div>
        <div class="row chatbox">
        <div class="col-4 " >
         
          </div>
       
        </div>
        <div class="col-10 " id="load-message-chat">
         
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
<input type="text" id="message_user" placeholder="Aa">
<button type="button" class="up_message_user" id="up_message_user">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
  </svg>
</button>
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
<script>
    function toggleReply(commentId) {
        var replyDiv = document.getElementById("reply-" + commentId);
        replyDiv.classList.toggle("hidden");
    }
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
<script>
 $(document).ready(function() {
    $(document).on('click', '#up_message_user', function() {
        var message_user = $('#message_user').val();
        var _token = $('input[name="_token"]').val();

        // Gọi yêu cầu AJAX đầu tiên
        $.ajax({
            url: "{{ url('/load-message-user') }}",
            method: "get",
            data: { message_user: message_user, _token: _token },
            success: function(data) {
            // Tạo một tin nhắn từ người dùng
            var userMessageHtml = `
                <div class = "row"
                <div class="message-row">
                <div class="col-4"></div>
                <div class="col-8 right-to-left-text bottom-margin" id="load-message-user">${data}</div>
                </div>
                </div>
            `;
            $('.chatbox').append(userMessageHtml);

            // Gọi yêu cầu AJAX thứ hai và hiển thị tin nhắn từ trợ lý
            callChatBot(message_user, _token);
            }
        });  
    });

    // Hàm gọi yêu cầu AJAX thứ hai và hiển thị tin nhắn từ trợ lý
    function callChatBot(message_user, _token) {
        $.ajax({
            url: '{{ url('/chat-bot') }}',
            method: 'POST',
            data: {message_user: message_user, _token: _token},
            beforeSend: function() {
                // Hiển thị thông báo "đang chờ"
                $('#load-message-chat').append('<div class="chat assistant-message loading">   <img src="https://static.vecteezy.com/system/resources/previews/021/303/384/original/chatbot-icon-cute-smiling-robot-cartoon-character-illustration-png.png" alt="User Avatar" class="user-avatar"> Đang chờ...</div>');
            },
            success:function(data) {
                // Xóa thông báo "đang chờ"
                $('.loading').remove();

                // Tạo một tin nhắn từ trợ lý
                var assistantMessageHtml = `
                <div class ="row"
                <div class="message-row">
                <div class="col-3"><img src="https://static.vecteezy.com/system/resources/previews/021/303/384/original/chatbot-icon-cute-smiling-robot-cartoon-character-illustration-png.png" alt="User Avatar" class="user-avatar"></div>
                <div class="col-9 left-to-right-text bottom-margin" id="load-message-user">${data}</div>
                </div>
                </div>
            `;
                $('.chatbox').append(assistantMessageHtml);
            }
        });
    }
});
</script>
<script>
    var messages = [];

    function sendMessage() {
      var messageInput = document.getElementById('message-input');
      var message = messageInput.value;
      messages.push(message);

      var chatWindow = document.getElementById('chat-window');
      chatWindow.innerHTML = '';

      for (var i = 0; i < messages.length; i++) {
        var messageElement = document.createElement('div');
        messageElement.textContent = messages[i];
        chatWindow.appendChild(messageElement);
      }

      messageInput.value = '';
    }
  </script>
<script>
    function toggleServiceContainer(serviceId) {
        var serviceInformation = document.getElementById('service-information-' + serviceId);
        var viewMoreBtn = document.getElementById('view-more-btn-' + serviceId);

        if (serviceInformation.style.maxHeight === '100px') {
            serviceInformation.style.maxHeight = 'none';
            viewMoreBtn.textContent = 'Thu gọn';
        } else {
            serviceInformation.style.maxHeight = '100px';
            viewMoreBtn.textContent = 'Xem thêm';
        }
    }
</script>
    <script>
    document.getElementById('findPasswordLink').addEventListener('click', function() {
        $('#password').modal('hide');
        $('#findpassword').modal('show');
    });
</script>
<script>
function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
        var _token = $('input[name="_token"]').val();    
        var user_image = fileInput.files[0];
        var formData = new FormData();
        formData.append('user_image', user_image);
        formData.append('_token', _token);
        
        $.ajax({
            url: '{{ url('/update-image-user') }}',
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                // Xử lý thành công
            },
            error: function(xhr, status, error) {
                // Xử lý khi có lỗi
            }
        });
    }
}
</script>
    <!-- Template Javascript -->
    <script src="{{ asset('public/fontend/user/js/main.js') }}"></script>
</body>
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

<!-- account -->
<script >
  $(document).ready(function(){
    $('.find-password').click(function(){
        var gmail = $(this).data('gmail');
        var _token = $('input[name="_token"]').val();       
        $.ajax({
            url: '{{ url('/find-password') }}',
            method: 'get',
            data: {gmail: gmail, _token: _token},
            success:function() {
                swal({
                        title: "Đã gửi thành công vào gmail",
                        text: "Vui lòng nhập mã vào ô bên dưới",
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
<!-- check code -->
<script>
    $(document).ready(function() {
        $('.check-code').click(function() {
            var button = $(this);
            var user_id = $(this).data('user_id');
            var code = $('#code').val();
            var _token = $('input[name="_token"]').val();
            
            $.ajax({
                url: '{{ url('/check-code') }}',
                method: 'GET',
                data: { user_id: user_id, code: code, _token: _token },
                success: function(response) {
                    if (response.status === 'success') {
                        // Code is correct
                        button.removeClass('check-code');
                        button.html('<i class="fas fa-check"></i>');

                        $('#new-password').html(response.message);
                        // Perform other actions here
                    } else {
                        // Code is incorrect
                        $('#new-password').removeClass('new-password');
                        button.html('<i class="fas fa-times"></i>');
                        // Perform other actions here
                    }
                },
                error: function() {
                    alert('An error occurred while checking the code.');
                }
            });
        });
    });
</script>
<!-- account -->
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
<!-- search-service -->
<script >
  $(document).ready(function(){
    $('.search-service').change(function(){
        var admin_information_id =  $(this).data('admin_information_id');
        var search_name = $('#search_name').val();
        var _token = $('input[name="_token"]').val();  
          
        $.ajax({
            url: '{{ url('/search-service') }}',
            method: 'get',
            data: {admin_information_id:admin_information_id,search_name: search_name, _token: _token},
            success:function(data) {
                $('.load-search').html(data);
            }
        });
    });
});
</script>
<!-- end search-service -->

 <!-- booking  -->
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
            //check code
            $('.check-endow').click(function(){
                var admin_information_id = $(this).data('admin_information_id');
                var code = $('#code').val();
                var category_id = $('#category_id').val();
                var service_price = $('#service_prices').val();
                var _token = $('input[name="_token"]').val();
                var button = $(this); 
                $.ajax({
                    url: '{{ url('/check-endow') }}',
                    method: 'get',
                    data: {admin_information_id: admin_information_id, code: code, category_id: category_id, service_price: service_price, _token: _token},
                    success:function(data) {
                        button.html('<i class="fas ' + (data.status === 'V' ? 'fa-check-circle' : 'fa-times-circle') + '"></i>');
                        if (data.price !== undefined) {
                            $('#price').html('Số tiền cần phải thanh toán là : ' + data.price + ' VNĐ' +
    '<input class="form-control service_price" id="service_price" type="hidden" value="' + data.price + '" />');
                        }
                    }
                });
            });
            //booking
            $('.booking').click(function(){
                var pay = $('input[name="radio"]:checked').val();
      
                var date = $('.date:checked + label').text(); // Lấy nội dung của label liền kề input radio ngày được chọn
                var time = $('.time:checked + label').text(); // Lấy nội dung của label liền kề input radio thời gian được chọn
                var code = $('#code').val(); 
                var service_price = $('#service_price').val(); 
                var service_id = $(this).data('service_id');
                var staff_id = $('#staff_id').val(); 
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
               if(pay == 1){
                $.ajax({
                url: '{{ url('/load-booking') }}',
                method: 'POST',
                data: {date: date,
                    pay:pay,
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
                    staff_id:staff_id,
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
               }else{
                $.ajax({
                url: '{{ url('/pay-vnpay') }}',
                method: 'POST',
                data: {date: date,
                    pay:pay,
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
                    staff_id:staff_id,
                      _token: _token},
                success:function(data) {
                    var response = JSON.parse(data); // Chuyển đổi dữ liệu từ chuỗi JSON thành đối tượng JavaScript
                    if (response.code === "00") {
                        var paymentUrl = response.data;
                        window.location.href = paymentUrl;
                    }
                                    
            }
        });
               }
                
    });
            // end booking
            }
        });
    });
});

</script>
 <!-- end booking -->

 <script>
    
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