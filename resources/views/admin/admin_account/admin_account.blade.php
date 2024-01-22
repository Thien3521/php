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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Thông tin spa     /</span> Tài khoản</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Thông tin</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-notifications.html"
                        ><i class="bx bx-bell me-1"></i> Thông báo </a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('all-basis')}}"
                        ><i class="bx bx-link-alt me-1"></i>Các cơ sở </a
                      >
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Thông tin</h5>
                    <!-- Account -->
                    
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <!-- <img
                          src="{{ asset('/public/uploads/')}}"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="200"
                          width="200"
                          id="uploadedAvatar"
                        /> -->
      
                        </div>
                    <form action="{{ url('/add-information-account')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="button-wrapper" >
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Tải ảnh lên</span >
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" class="admin_image"  name="admin_image">
                          </label>
                          
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Tên doanh nghiệp</label>
                            <input
                              class="form-control admin_information_name"
                              type="text"
                              id="admin_information_name"
                              name="admin_information_name"
                              placeholder="Tên doanh nghiệp"
                             
                            />
                          </div>  
                        <div class="mb-3 col-md-6">
                          <label for="defaultSelect" class="form-label"> Tỉnh </label>
                          <select id="city" name="city" class="form-control input-sm m-bot15 choose city">
                          @foreach($data as $data)
                            <option value="{{$data->matp}}" >{{$data->name_city}}            
                          </option>                  
                            @endforeach
                          </select>
                        </div>               
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Giới thiệu</label>
                            <input class="form-control admin_introduce" type="text" name="admin_introduce" placeholder="sssssssssss" id="lastName"  />
                          </div>
                        <div class="mb-3 col-md-6">
                          <label for="defaultSelect" class="form-label">huyện </label>
                          <select name="province" id="province" class="form-control input-sm m-bot15 choose city province">
                            <option >---Chọn quận huyện---</option>
                          </select>
                        </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Điện thoại</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">US (+84)</span>
                              <input
                                type="text"
                                id="admin_phone"
                                
                                name="admin_phone"
                                class="form-control admin_phone"
                                placeholder="386 546 342"
                              />
                            </div>
                          </div>
                      <div class="mb-3 col-md-6">
                        <label for="defaultSelect" class="form-label">Xã </label>
                        <select name="wards" id="wards" class="form-control input-sm m-bot15 wards province">
                          <option value="">---Chọn xã phường---</option>
                        </select>
                      </div>
                      
                      <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Email</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control email"
                                placeholder="Ngocq@gmail.com"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Số nhà / Tên đường </label>
                            <div class="input-group input-group-merge">                      
                              <input
                                type="text"
                                id="number_address"
                                
                                name="number_address"
                                class="form-control number_address"
                                placeholder="240/Trần Đại Nghĩa"
                              />
                            </div>
                          </div>
                      <div class="row mb-3 col-md-6">
                        <div class="col-md-6 mb-3">
                      
                            <label for="currency" class="form-label">Giờ mở cửa</label>
                            <input type="time" name = "open_time" class= "input-group-text open_time">
                        
                        </div>
                        <div class="col-md-6 mb-3">
                      
                            <label for="currency" class="form-label">Giờ mở cửa</label>
                            <input type="time" name = "close_time" class= "input-group-text close_time">
                        </div>
                        
                    </div>
                    <h5 class="card-header">Tài khoản</h5>
                    
                    <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Tên tài khoản đăng nhập </label>
                            <div class="input-group input-group-merge">                      
                              <input
                                type="email"
                                id="admin_email"
                                
                                name="admin_email"
                                class="form-control admin_email"
                                placeholder="q@email.com"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Tên cơ sở</label>
                            <div class="input-group input-group-merge">                      
                              <input
                                type="text"
                                id="admin_name"
                                
                                name="admin_name"
                                class="form-control admin_name"
                                placeholder="Spa PuPu cơ sở 1"
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Mật khẩu </label>
                            <div class="input-group input-group-merge">                      
                              <input
                                type="password"
                                id="admin_password"
                                
                                name="admin_password"
                                class="form-control admin_password"
                                placeholder="Nhập mật khẩu "
                              />
                            </div>
                          </div>
                          
                           
                        <div class="mt-2">
                          <button type = "button"  name = "save-admin-information" class="btn btn-primary me-2 save-admin-information">Lưu thông tin</button>
                          <button type="reset" class="btn btn-outline-secondary">Hủy</button>
                        </div>
                      </form>
                      
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                    </div>
                    <!-- /Account -->
                  </div> 
                </div>
              </div>
            </div>

    @endsection       