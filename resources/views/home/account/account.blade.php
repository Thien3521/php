 <!--====== App Content ======-->
 @extends('home.home_layout')
@section('content')
@foreach($account as $account)
@csrf
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Trang chủ </a></li>
            <li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
            <li class="breadcrumb-item active" aria-current="page">Trang cá nhân</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          <div>
            <div class="d-flex justify-content-center mb-4">
            @if($account->user_image != null)
              <img src="{{asset('public/uploads/'.$account->user_image)}}"
              class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;" alt="example placeholder" alt="">
            @else
              <img id="selectedAvatar" src="https://cdn.tuoitre.vn/thumb_w/640/471584752817336320/2023/2/13/tieu-su-ca-si-rose-blackpink-12-167628252304049682913.jpg"
              class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;" alt="example placeholder" />
            @endif
            </div>
            <div class="d-flex justify-content-center">
                <div class="btn btn-primary btn-rounded">
                    <label class="form-label text-white m-1" for="customFile2">Đổi ảnh đại diện</label>
                    <input type="file" class="form-control d-none" name="user_image" id="customFile2" onchange="displaySelectedImage(event, 'selectedAvatar')" />
                </div>
            </div>
        </div>
            <h5 class="my-3">{{$account->user_name}}</h5>
            <p class="text-muted mb-1">Chào mừng bạn </p>
            <p class="text-muted mb-4">Bạn có thể xem các thông tin của bạn</p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#password">Thay đổi mật khẩu</button>
              <button type="button" class="btn btn-outline-primary ms-1">Nhắn tin</button>
            </div>
          </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="passwordLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordLabel">Thay đổi mật khẩu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="inputPassword5" class="form-label">Mật khẩu hiện tại</label>
                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            </div>
            <div class="modal-body">
                <label for="inputPassword5" class="form-label">Mật khẩu mới</label>
                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            </div>
            <div class="modal-body">
                <label for="inputPassword5" class="form-label">Nhập lại mật khẩu mới</label>
                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            </div>
            <div class="modal-body">
                <a href="#" id="findPasswordLink">Tìm lại mật khẩu ?</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="findpassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="findpasswordLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form action="{{url('new-password')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="findpasswordLabel">Tìm lại mật khẩu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="inputEmail" class="form-label">Gửi mail</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputEmail" value="{{$account->user_gmail}}" readonly>
                        <button type="button" class="btn btn-info find-password" data-gmail ="{{$account->user_gmail}}">Gửi</button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputCode" class="form-label">Nhập mã</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="code" name="code">
                        <button type="button" class="btn btn-info check-code" data-user_id="{{$account->user_id}}">Kiểm tra</button>
                    </div>
                </div>
                
                <div class ="new-password" id ="new-password"></div>
            </div>
            
        </div>
        </form>
    </div>
</div>
<!-- Modal -->

        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-tiktok fa-lg" style="color: #333333;"></i>
                <p class="mb-0">Ngọc_quí</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                <p class="mb-0">@Ngọc_quí</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                <p class="mb-0">Ngọc_quí</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                <p class="mb-0">Ngọc_quí</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Tên</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$account->user_name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$account->user_email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Số điện thoại</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">(097) 234-5678</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Địa chỉ</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card mb-4 mb-md-0">
              <div class="card-body ">
                <p class="mb-4"><span class="text-primary font-italic me-1">Danh sách </span> Lịch trình của bạn
                </p>
                @foreach($booking_user as $booking_user)
                    <div class="row g-0">
                        <div class="col-md-1">
                            <img src="https://cdn.tuoitre.vn/thumb_w/640/471584752817336320/2023/2/13/tieu-su-ca-si-rose-blackpink-12-167628252304049682913.jpg" class="rounded-circle img-fluid" style="width: 150px;" alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                            <h5 class="card-title">{{$booking_user->booking_service->admin_service_name}}</h5>
                            <div class="row">
                                <div class="col-5">
                                <i class="bi bi-geo-alt"></i>{{$booking_user->service->adminInformation->adminAddress->admin_address}}
                                </div>
                                <div class="col-2">
                                    Ngày
                                </div>
                                <div class="col-2">
                                    Giờ
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-5">
                                </div>
                                <div class="col-2">
                                {{$booking_user->booking_day}}
                                </div>
                                <div class="col-2">
                                {{$booking_user->booking_shift}}
                                </div>
                                <div class="col-3">
                                
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detail{{$booking_user->booking_id}}">
                                Xem chi tiết
                              </button>
                              <!-- Modal -->
                                <div class="modal fade" id="detail{{$booking_user->booking_id}}" tabindex="-1" aria-labelledby="detailLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                      <div class="modal-header text-center  ">
                                      <h1 class="modal-title text-primary  " align = "center">Chi tiết đơn hàng #{{$booking_user->booking_id}}</h1>
                                      
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                      <div class="container ">
                                            
                                            <div class="row">
                                            <div class="col-md-6 border border-info">
                                                    <h2 class="modal-title text-info ">Thông tin khách hàng</h2>
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Họ tên:</th>
                                                                <td>{{$booking_user->booking_user->bk_user_name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Email:</th>
                                                                <td>{{$booking_user->booking_user->bk_user_email}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Số điện thoại:</th>
                                                                <td>0{{$booking_user->booking_user->bk_user_phone}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-6 border border-info">
                                                    <h2 class="modal-title text-info ">Thông tin lịch đặt</h2>
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Mã :</th>
                                                                <td>{{$booking_user->booking_id}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Ngày đặt :</th>
                                                                <td>{{$booking_user->booking_day}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Tổng giá trị:</th>
                                                                <td>{{number_format($booking_user->booking_price)}} VNĐ</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <h2 class="modal-title text-info ">Dịch vụ lịch đặt</h2>
                                            <table class="table table-bordered border-info">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Tên cơ sở</th>
                                                        <th scope="col">Địa chỉ</th>
                                                        <th scope="col">Tên dịch vụ</th>
                                                        <th scope="col">Nhân viên</th>
                                                        <th scope="col">Số phòng</th>
                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">Đơn giá (VNĐ)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">{{$booking_user->service->adminInformation->admin_information_name}}</th>
                                                        <td>{{$booking_user->service->adminInformation->adminAddress->admin_address}}</td>
                                                        <td>{{$booking_user->service->service_name}}</td>
                                                        <td>{{$booking_user->adminstaff->admins->admin_name}}</td>
                                                        <td>@if(isset($booking_user->rooms) && $booking_user->rooms->room_number != null)
                                                                {{$booking_user->rooms->room_number}}
                                                            @else
                                                                Chưa 
                                                            @endif
                                                        </td>
                                                        <td>{{$booking_user->booking_quantity}}</td>
                                                        <td>{{number_format($booking_user->booking_price)}} </td>
                                                    </tr>
                                                 
                                                </tbody>
                                            </table>
                                        </div>

                                        <h2 align = "center" class="text-info">Trạng thái</h2> 
                                      <div class="row justify-content-center">
                                        <div class = "col-md-3" ><p align = "center"> Chờ xác nhận</p></div>
                                        <div class = "col-md-3"> <p align = "center"> Đã xác nhận</p>
                                        </div>
                                        <div class = "col-md-3"><p align = "center"> Đang thực hiện</p></div>
                                        <div class = "col-md-3"><p align = "center"> Đã xong</p></div>
                                      </div>
                                      <div class="progress">
                                        <div class="progress-bar flex-fill @if($booking_user->booking_status >= 0) bg-success @else bg-light @endif" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            @if($booking_user->booking_status >= 0)
                                                <i class="bi bi-check-circle bi-3x bg-success"></i>
                                            @endif
                                        </div>
                                        <div class="progress-bar flex-fill @if($booking_user->booking_status >= 1) bg-success @else bg-light @endif" role="progressbar" style="width: 25%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            @if($booking_user->booking_status >= 1)
                                                <i class="bi bi-check-circle bi-3x"></i>
                                            @endif
                                        </div>
                                        <div class="progress-bar flex-fill @if($booking_user->booking_status >= 2) bg-success @else bg-light @endif" role="progressbar" style="width: 25%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                            @if($booking_user->booking_status >= 2)
                                                <i class="bi bi-check-circle bi-3x"></i>
                                            @endif
                                        </div>
                                        <div class="progress-bar flex-fill @if($booking_user->booking_status >= 3) bg-success @else bg-light @endif" role="progressbar" style="width: 25%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                            @if($booking_user->booking_status >= 3)
                                                <i class="bi bi-check-circle bi-3x bg-success"></i>
                                            @endif
                                        </div>
                                        
                                    </div>
                                      </div>
                                      <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                        <button type="button" class="btn btn-info">Liên hệ</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                               <!-- e modal -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                </div>
                                <div class="col-2">
                               
                                </div>
                                <div class="col-4">
                                    @if ($booking_user->booking_status == 0)
                                       Chờ xác nhận
                                    @elseif ($booking_user->booking_status == 1)
                                        Đã xác nhận
                                    @elseif ($booking_user->booking_status == 2)
                                        Đang thực hiện
                                    @elseif ($booking_user->booking_status == 3)
                                        Đã hoàn thành
                                    @endif
                                </div> 
                            </div>
                            <p class="card-text"></p>
                            <p class="card-text"><small class="text-muted">#{{$booking_user->booking_id}}</small></p>
                        </div>
                    </div>
                    <hr>
                @endforeach  
                <nav aria-label="Page navigation example" >
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach
@endsection   
<style>
  .image-container {
    border: 2px solid #000;
    padding: 10px;
  }

  
</style>