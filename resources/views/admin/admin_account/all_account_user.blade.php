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
                            @foreach($account_user as $account_user)
                            <tbody>
                                <td>{{$account_user->user_name}}</td>
                                <td>{{$account_user->user_email}}</td>
                                <td>{{$account_user->user_password}}</td>
                                <td><a href="{{url('delete-user/'.$account_user->user_id)}}">Xóa</a></td>
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