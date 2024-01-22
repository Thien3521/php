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
 <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dịch vụ/</span> Tất cả dịch vụ</h4>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
  Thêm dịch vụ
</button>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl-12">
    <!-- Bordered Table -->
    <div class="card">
      <h5 class="card-header">Bảng dịch vụ</h5>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Tên dịch vụ</th>
                <th>Thông tin </th>
                <th>Hình ảnh </th>
                <th>Giá </th>
                <th>Mô tả </th>
                <th>Chỉnh sửa</th>
                
              </tr>
            </thead>
            <tbody class="load-service">
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
            <h5 class="modal-title" id="exampleModalLongTitle">Thêm dịch vụ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="add-service-form" method="POST" action="{{url('/add-service')}}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Chọn cơ sở</label>
                <select class="form-select admin_information_id" name="admin_information_id" id="admin_information_id" aria-label="Default select example">
                @foreach($tbl_information as $tbl_information)
                  <option name="admin_information_id" value="{{$tbl_information->admin_information_id}}">{{$tbl_information->admin_information_name}}</option>
                @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Chọn danh mục</label>
                <select class="form-select category_id" name="category_id" id="category_id" aria-label="Default select example">
                @foreach($category as $category)
                  <option name="category_id" value="{{$category->category_id}}">{{$category->category_name}}</option>
                @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Tên </label>
                <input type="text" class="form-control" name="service_name" id="service_name" placeholder="vd : Làm đẹp" />
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input class="form-control" type="file" name="service_image" id="service_image" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Thông tin </label>
                <input type="text" class="form-control" name="service_information" id="service_information" placeholder="vd : Giúp cải tạo ...." />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Giá</label>
                <input type="text" class="form-control" name="service_price" id="service_price" placeholder="vd : 100,000 VNĐ" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Mô tả</label>
                <input type="text" class="form-control" name="service_describe" id="service_describe" placeholder="vd : Giúp cải tạo ...." />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary add-service" name="add-service">Thêm dịch vụ</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end model -->
    @foreach($services as $services)
     <!-- Modal -->
     <div class="modal fade" id="edit_service{{$services->service_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Thêm dịch vụ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="edit-service-form" method="POST" action="{{url('/edit-service')}}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Chọn cơ sở</label>
                <select class="form-select admin_information_id" name="admin_information_id" id="admin_information_id" aria-label="Default select example">
                @foreach($tbl_information2 as $tbl_informations)
                  <option name="admin_information_id" value="{{$tbl_informations->admin_information_id}}">{{$tbl_informations->admin_information_name}}</option>
                @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Chọn danh mục</label>
                <select class="form-select category_id" name="category_id" id="category_id" aria-label="Default select example">
                @foreach($category2 as $categorys)
                  <option name="category_id" value="{{$categorys->category_id}}">{{$categorys->category_name}}</option>
                @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Tên </label>
                <input type="text" class="form-control" name="service_name" id="service_name" 
                value="{{$services->service_name}}" placeholder="vd : Làm đẹp" />
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Hình ảnh</label>
                <input class="form-control" type="file" name="service_image" id="service_image" 
                value="{{$services->service_image}}"/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Thông tin </label>
                <input type="text" class="form-control" name="service_information" id="service_information" 
                value="{{$services->service_information}}"placeholder="vd : Giúp cải tạo ...." />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Giá</label>
                <input type="text" class="form-control" name="service_price" id="service_price" 
                value="{{$services->service_price}}"placeholder="vd : 100,000 VNĐ" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Mô tả</label>
                <input type="text" class="form-control" name="service_describe" id="service_describe" 
                value="{{$services->service_describe}}"placeholder="vd : Giúp cải tạo ...." />
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary edit-service" data-service_id= "{{$services->service_id}}" name="edit-service">Sửa dịch vụ</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end model -->
    @endforeach
  </div>
</div>

@endsection