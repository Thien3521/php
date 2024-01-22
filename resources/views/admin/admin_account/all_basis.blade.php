<?php
if(Session::get('admin_status') == 2){
    $layout = 'admin.admin_layout';
} elseif(Session::get('admin_status') == 3) {
    $layout = 'admin.admin_boss_layout';
} else {
    $layout = 'admin.admin_staff_layout';
}
?>
@extends($layout)
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Thông tin spa     /</span> Tài khoảng</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link " href=""><i class="bx bx-user me-1"></i> Thông tin</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-notifications.html"
                        ><i class="bx bx-bell me-1"></i> Thông báo </a
                      >
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link active"  href="{{url('all-basis')}}"
                        ><i class="bx bx-link-alt me-1"></i>Các cơ sở </a
                      >
                    </li>
                  </ul>
                  <h6 class="pb-1 mb-4 text-muted">Grid Card</h6>
                    <div class="row row-cols-1 row-cols-md-5 g-4 mb-5">
                    @foreach($admin_basis as $admin_basis)
                    <div class="col">
                    <div class="card h-100">
                        <img class="card-img-top" height="200px" src="{{asset('public/uploads/'.$admin_basis->admin_image)}}" alt="Card image cap" />
                        <div class="card-body">
                        <h5 class="card-title">Tên: {{$admin_basis->admin_information_name}}</h5>
                        <p class="card-text">
                            Giới thiệu: 
                            {{$admin_basis->admin_introduce}}
                        </p>
                        <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
  <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
  <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
</svg>
                            Giờ mở cửa
                            {{$admin_basis->open_time}}
                        </p>
                        <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
  <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5zm2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.035 8.035 0 0 0 .86 5.387zM11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.035 8.035 0 0 0-3.527-3.527z"/>
</svg>
                            Giờ đóng cửa
                            {{$admin_basis->close_time}}
                        </p>
                        <p class="card-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg>
                            Địa chỉ
                            {{$admin_basis->close_time}}
                        </p>
                        <button type="button" name="" class="btn btn-primary center">Chỉnh sửa </button>
                        
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
               
              </div>
            </div>

    @endsection       