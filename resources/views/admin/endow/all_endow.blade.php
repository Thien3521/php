@extends('admin.admin_layout')
@section('content')
 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dịch vụ/</span> Các loại ưu đãi</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Thêm ưu đãi
                </button>
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl-12">
                    <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Bảng ưu đãi</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Tên ưu đãi</th>
                          <th>Hình ảnh </th>
                          <th>Thông tin </th>
                          <th>Mã</th>
                          <th>Ngày bắt đầu</th>
                          <th>Ngày kết thúc</th>
                          
                          <th>Chỉnh sửa </th>
                        </tr>
                      </thead>
                      <tbody class="load-endow">
                        
                       
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm ưu đãi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method = "POST" action="{{url('/add-endow')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Tên ưu đãi</label>
                          <input type="text" class="form-control" name="endow_name" id="endow_name" placeholder="vd : Làm đẹp" />
                        </div>
                        <div class="mb-3">
                          <label for="exampleFormControlSelect1" class="form-label">Chọn danh mục</label>
                          <select class="form-select category_id" name="category_id" id="category_id" aria-label="Default select example">
                          @foreach($category as $categorys)
                            <option name="category_id" value="{{$categorys->category_id}}">{{$categorys->category_name}}</option>
                          @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Chọn ảnh</label>
                          <input type="file" class="form-control" name="endow_image" id="endow_image" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Mã code</label>
                          <input type="text" class="form-control" name="endow_code" id="endow_code" placeholder="vd : xGd01F" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Giảm giá</label>
                          <input type="text" class="form-control" name="endow" id="endow" placeholder="vd : xGd01F" />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Thông tin</label>
                          <input type="text" class="form-control" name="endow_information" id="endow_information" placeholder="vd : Giúp cải tạo ...." />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Thời gian bắt đầu</label>
                          <input type="date" class="form-control" name="endow_day_begin" id="endow_day_begin"  />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Thời gian kết thúc</label>
                          <input type="date" class="form-control" name="endow_day_end" id="endow_day_end" />
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                        <button type="button" class="btn btn-primary add-endow" name = "add-endow">Thêm ưu đãi</button>
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