<?php
if(Session::get('admin_status') >= 2){
    $layout = 'admin.admin_layout';
} else {
    $layout = 'admin.admin_staff_layout';
}
?>
@extends($layout)
@section('content') 
@foreach($booking as $booking)  

<div class="container">
 <div class="row">
        <div class="col-sm-9 col-md-12">
        <h5 class="card-header">Thông tin</h5>
             <!-- Bordered Table -->
         <div class="card">
                <h5 class="card-header">Thông tin người dùng</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Tên</th>
                          <th>Số điện thoại</th>
                          <th>Gmail</th>
                          <th>Ghi chú</th>
                          <th>Chỉnh sửa</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                       
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i>{{$booking->booking_user->bk_user_name}} <strong>
                            </strong>
                          </td>
                          <td>{{$booking->booking_user->bk_user_phone}}</td>
                          <td>{{$booking->booking_user->bk_user_email}}</td>
                          <td><span class="badge bg-label-primary me-1">{{$booking->booking_user->bk_user_note}}</span></td>
                          <td>
                          <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#edit_booking_user"  >
                          Chỉnh sửa
                        </button>
                         </td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
         
        </div>
        <div class="col-sm-12 col-md-12">
        <h5 class="card-header">Thông tin dich vụ</h5>
         <!-- Bordered Table -->
         <div class="card">
                <h5 class="card-header">Thông tin dịch vụ</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Mã</th>
                          <th>Tên dịch vụ</th>
                          <th>Tên spa</th>
                          <th>Địa chỉ</th>
                          <th>Giá</th>
                          <th>Chỉnh sửa</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                       
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                            {{$booking->booking_service->booking_service_id}}
                            </strong>
                          </td>
                          <td>
                          {{$booking->booking_service->admin_service_name}}
                          </td>
                          <td>
                          {{$booking->booking_service->bk_name}}
                          </td>
                          <td><span class="badge bg-label-primary me-1">
                          {{$booking->service->adminInformation->adminAddress->admin_address}}

                          </span></td>
                          <td>
                          {{$booking->booking_service->bk_price}}

                          </td>
                          <td>
                          <button type="button" class="btn btn-primary"data-toggle="modal" data-target="#edit_booking_service" >
                          Chỉnh sửa
                        </button>
                        </td>
                          
                          
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
         
        </div>
    </div>    
</div>



<div class="container">
 <div class="row">
     <div class="col-sm-3 col-md-12">
     <h5 class="card-header">Thông tin đơn đặt lịch hẹ</h5>
         <!-- Bordered Table -->
         <div class="card">
                <h5 class="card-header">Đơn đặt lịch </h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Mã số </th>
                          <th>Ngày đặt</th>
                          <th>Giờ đặt</th>                     
                          <th>Mã khuyến mãi</th>
                          <th>Số lượng</th>
                          <th>Giá</th>
                          <th>Tổng tiền</th>
                          <th>Mã phòng</th>
                          <th>Chỉnh sửa</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                       
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                            {{$booking->booking_id}}
                            </strong>
                          </td>
                          <td>
                          {{$booking->booking_day}}
                          </td>
                          <td> {{$booking->booking_shift}}</td>

                          <td> {{$booking->booking_code}}</td>
                          <td>
                          <div class="col-md-3 col-lg-3 col-xl-2 d-flex">  
                          <form method="POST" action="" enctype="multipart/form-data" >
                                @csrf
                          <input type="text" name = "price" value="" hidden>
                          <input id="form1" min="0" name="cart_qty" value="{{$booking->booking_quantity}}" type="number"
                            class="form-control form-control-sm" />
 
                        
                          <input  class="col-md" type="submit" value = "cập nhật">
                        </div>
                        </form>
                        
                        </td>
                          <td>
                          {{$booking->booking_price}}
                          </td>
                          <td name="tong">
                          
                            
                          </td>
                          <td>
                          {{$booking->room_id}}
                          </td>
                          <td>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_booking" >
                          Chỉnh sửa
                        </button>
                          </td>
                         
                        </tr> 
                        
                        <?php 
                        if($booking->booking_status == 0){
                          echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#'.$booking->booking_status.'" >
                          Chưa xác nhận
                        </button>';
                        }
                        elseif($booking->booking_status == 1){
                          echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.$booking->booking_status.'">
                          Đã xác nhận
                        </button>';
                        }
                        elseif($booking->booking_status == 2){
                          echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#'.$booking->booking_status.'">
                          Đang thực hiện
                        </button>';
                        }
                        elseif($booking->booking_status == 3){
                          echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#'.$booking->booking_status.'">
                          Đã xong
                        </button>';
                        }
                        ?>  
                        

                        <!-- Modal trạng thái đơn --> 
                        <div class="modal fade" id="{{$booking->booking_status}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc muốn duyệt đơn hàng này </h5>
                                
                              </div>
                        
                              <div class="modal-footer">
                              <form method="POST" action="{{url('add-status-booking/'.$booking->booking_id)}}" enctype="multipart/form-data" >
                                @csrf
                                <select class="form-select booking_status" name="booking_status" id="booking_status" aria-label="Default select example">
                                  <option name="booking_status" value="1">Xác nhận</option>
                                  <option name="booking_status" value="2">Đang thực hiện</option>
                                  <option name="booking_status" value="3">Hoàn thành</option>
                                </select>
                                @if($booking->booking_status == 0)
                                <select class="form-select room_id" name="room_id" id="room_id" aria-label="Default select example">
                                  @foreach($room as $room)
                                    <option value="{{ $room->room_id }}">{{ $room->room_number }} - ({{ $room->kind_of_room }})</option>
                                  @endforeach
                                </select>
                              @else
                                <!-- Your alternative HTML/content here -->
                              @endif

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                <input type="submit" class="btn btn-primary"  value = "Duyệt">
                                </form>
                                
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal edit booking user -->
                        <div class="modal fade" id="edit_booking_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin khách hàng</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                              <form method = "POST" action="{{url('/edit-booking-user/'.$booking->booking_user->booking_user_id.'/'.$booking->service->adminInformation->admin_information_id)}}"
                               enctype="multipart/form-data">
                              @csrf
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Tên khách hàng</label>
                                    <input type="text" class="form-control" name="bk_user_name" id="bk_user_name"
                                     value ="{{$booking->booking_user->bk_user_name}}" />

                                     <input type="hidden" class="form-control" name="booking_id" id="booking_id"
                                     value ="{{$booking->booking_id}}" />
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Số điện thoại</label>
                                    <input type="text" class="form-control" name="bk_user_phone" id="bk_user_phone" 
                                    value ="{{$booking->booking_user->bk_user_phone}}" />
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">Ghi chú</label>
                                    <input type="text" class="form-control" name="bk_user_note" id="bk_user_note"
                                   value ="{{$booking->booking_user->bk_user_note}}" />
                                  </div>
                                  
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                  <button type="submit" class="btn btn-primary ">Chỉnh sửa</button>
                                  </div>
                                </form>
                              </div>
                              </div>
                          </div>
                          </div>
                          <!-- Modal edit booking service-->
                        <div class="modal fade" id="edit_booking_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin dịch vụ</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                              <form method = "POST" action="{{url('/edit-booking-service/'.$booking->booking_service->booking_service_id)}}"
                               enctype="multipart/form-data">
                              @csrf
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Dịch vụ hiện tại : </label>
                                    <span class="badge bg-label-primary me-1">{{$booking->booking_service->bk_name}}</span>
                                    
                                    <select class="form-select service_id" name="service_id" id="service_id" aria-label="Default select example">
                                      @foreach($service as $services)
                                        <option name="service_id" value="{{$services->service_id}}">{{$services->service_name}}</option>
                                      @endforeach
                                      </select>
                                     <input type="hidden" class="form-control" name="booking_id" id="booking_id"
                                     value ="{{$booking->booking_id}}" />
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                  <button type="submit" class="btn btn-primary ">Chỉnh sửa</button>
                                  </div>
                                </form>
                              </div>
                              </div>
                          </div>
                          </div>

                         <!-- Modal edit booking booking -->
                         <div class="modal fade" id="edit_booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin đặt hàng</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                              <form method = "POST" action="{{url('/edit-booking/'.$booking->booking_id)}}"
                               enctype="multipart/form-data">
                              @csrf
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Ngày đặt</label>
                                    <input type="date" class="form-control" name="booking_day" id="booking_day"
                                     value ="{{$booking->booking_day}}" />

                                     <input type="hidden" class="form-control" name="booking_id" id="booking_id"
                                     value ="{{$booking->booking_id}}" />
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Giờ đặt</label>
                                    <input type="time" class="form-control" name="booking_shiff" id="booking_shiff" 
                                    value ="{{$booking->booking_shiff}}" />
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Số lượng</label>
                                    <input type="number" class="form-control" name="booking_quantity" id="booking_quantity" 
                                    value ="{{$booking->booking_quantity}}" min="1" max = "10"/>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                  <button type="submit" class="btn btn-primary ">Chỉnh sửa</button>
                                  </div>
                                </form>
                              </div>
                              </div>
                          </div>
                          </div>
                          
                        </form>
                        </td>
                          
                        </tr>
                        <tr>
                          
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
              <input type="hidden" id="email_user" value="{{$booking->booking_user->bk_user_email}}">
              <button type="button" data-booking_id="{{$booking->booking_id}}" class="btn btn-info send-mail" id = "send">Gửi mail</button>
    </div>    
    
</div>

@endforeach
@endsection   
