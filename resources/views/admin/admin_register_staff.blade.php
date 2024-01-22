@extends('admin.admin_staff_layout')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
<h3>Danh sách yêu cầu của bạn</h3>
    <!-- Basic Layout -->
    <div class="row">
    <div class="col-xl-12">
        <!-- Bordered Table -->
    <div class="card">
    <h5 class="card-header">Bảng yêu cầu</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
        <div class="card">
                <h5 class="card-header">Các yêu cầu</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Tên cơ sở Spa</th>
                          <th>Địa chỉ</th>
                          <th>Trạng thái</th>
                          <th>Chỉnh sửa</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                     @foreach($register_staff as $register_staff)
                     <td>{{$register_staff->admin_information_name}}</td>
                     <td>{{$register_staff->admin_information_name}}</td>
                     <td>{{$register_staff->admin_information_name}}</td>
                     @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
    </div>
    </div>
</div>
@endsection    