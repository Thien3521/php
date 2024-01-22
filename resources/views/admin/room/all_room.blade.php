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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Phòng/</span> Tất cả phòng</h4>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Thêm phòng
                </button>
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl-12">
                    <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Bảng phòng</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Số phòng</th>
                          <th>Loại phòng</th>    
                          <th>Chỉnh sửa</th>                
                        </tr>
                      </thead>
                      <tbody class="load-room">
                    
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm phòng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form method = "POST" action="{{url('/add-room')}}" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-fullname">Tên phòng</label>
                          <input type="text" class="form-control" name="room_number" id="room_number" placeholder="vd : Làm đẹp" />
                        </div>
                       
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Loại phòng</label>
                          <input type="text" class="form-control" name="kind_of_room" id="kind_of_room" placeholder="vd : Đơn" />
                        </div>
                        
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                        <button type="button" class="btn btn-primary add-room" name = "add-room">Thêm </button>
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