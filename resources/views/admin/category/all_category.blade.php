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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh Mục/</span> Tất cả danh mục</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Thêm danh mục
                </button>
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl-12">
                    <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Bảng danh mục</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Tên danh mục</th>
                          <th>Thông tin danh mục</th>
                          <th>Hình ảnh danh mục</th>
                          <th>Chỉnh sửa</th>
                          
                        </tr>
                      </thead>
                      <tbody class="load-category">
                      
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method = "POST" action="{{url('/add-category')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Tên danh mục</label>
                          <input type="text" class="form-control" name="category_name" id="category_name" placeholder="vd : Làm đẹp" />
                        </div>
                        <div class="mb-3">
                          <label for="formFile" class="form-label">Hình ảnh danh mục</label>
                          <input class="form-control" type="file" name="category_image" id="category_image" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Thông tin danh mục</label>
                          <input type="text" class="form-control" name="category_information" id="category_information" placeholder="vd : Giúp cải tạo ...." />
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                        <button type="button" class="btn btn-primary add-category" name = "add-category">Thêm danh mục</button>
                        </div>
                      </form>
                    </div>
                    </div>
                </div>
                </div>
                </div> 
              </div>
            </div>
            <!-- / Content -->
@endsection