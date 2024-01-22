<?php
if(Session::get('admin_status') >= 2){
    $layout = 'admin.admin_layout';
} else {
    $layout = 'admin.admin_staff_layout';
}
?>
@extends($layout)
@section('content')
 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
 <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Trải nghiệm của khách hàng/</span> Tất cả </h4>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
  Thêm trải nghiệm
</button>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl-12">
    <!-- Bordered Table -->
    <div class="card">
      <h5 class="card-header">Bảng trải nghiệm của khách hàng</h5>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Mã</th>
                <th>Tên</th>
                <th>Tên dịch vụ</th>
                <th>Hình ảnh trước</th>
                <th>Hình ảnh sau</th>
                <th>Chỉnh sửa</th>
                
              </tr>
            </thead>
            <tbody class="load-experience">
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--/ Bordered Table -->
  </div>
  <div class="col-xl-3">
      <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Thêm Nhân viên</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="formFile" class="form-label">Tên khách hàng</label>
                <input class="form-control" type="text" name="user_name" placeholder="vd : Hồ Ngọc Qúi" id="user_name"  />
                
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Dịch vụ</label>
                <select class="form-select  service_name" name="service_name" id="service_name" aria-label="Default select example">';
                @foreach($service as $service)
                  <option name="service_name" value="{{$service->service_name}}">
                    {{$service->service_name}}</option>';
                @endforeach                         
              </select>
              <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh trước</label>
                <input class="form-control" type="file" name="user_image1" id="user_image1" />
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh sau</label>
                <input class="form-control" type="file" name="user_image2" id="user_image2" />
              </div>
              

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary add-experience" name="add-experience">Thêm nhân viên</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end model -->
   
    
  </div>
</div>

@endsection