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
 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tài khoản/</span> Các tài khoản của các cơ sở</h4>
            
              <!-- Basic Layout -->
              <div class="row">
              <div class="col-xl-12">
                    <!-- Bordered Table -->
                    <div class="card">
                        <h5 class="card-header">Bảng tài khoản đang chờ duyệt</h5>
                        <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Tài khoản đăng nhập</th>
                                <th>Trạng thái</th>
                                <th>Xác nhận</th>
                                
                                </tr>
                            </thead>
                            @foreach($admin_staff as $staff)
                                <tbody>
                                    @if (!is_null($staff->register_staff))
                                        <td>{{ $staff->register_staff->regiter_staff_id }}</td>
                                        <td>{{ $staff->register_staff->admin_id }}</td>
                                        <td>Chờ xác nhận</td>
                                        <td><a href="{{ url('confirm-admin-staff/'.$staff->register_staff->admin_id ) }}">Xác nhận</a></td>
                                    @else

                                    @endif
                                    
                                    
                                </tbody>
                            @endforeach
                            </table>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-xl-12">
                    <!-- Bordered Table -->
                    <div class="card">
                        <h5 class="card-header">Bảng tài khoản</h5>
                        <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th>Tên</th>
                                <th>Tài khoản đăng nhập</th>
                                <th>Mật khẩu</th>
                                <th>Chỉnh sửa</th>
                                
                                </tr>
                            </thead>
                            @foreach($tbl_admin as $tbl_admin)
                            <tbody>
                                <td>{{$tbl_admin->admin_name}}</td>
                                <td>{{$tbl_admin->admin_email}}</td>
                                <td>{{$tbl_admin->admin_password}}</td>
                                <td><a href="{{url('delete-admin/'.$tbl_admin->admin_id)}}">Xóa</a></td>
                            </tbody>
                            @endforeach
                            </table>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
@endsection