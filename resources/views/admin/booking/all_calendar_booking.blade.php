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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Đơn đặt lịch/</span> Tất cả đơn</h4>
             
              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xl-12">
                    <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header">Bảng đặt lịch</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Mã</th>
                          <th>Số lượng</th>
                          <th>Ngày đặt </th>
                          <th>Giờ đặt</th>
                          <th>Hình thức thanh toán</th>
                          <th>Trạng thái</th>
                          <th>Xem chi tiết</th>
                        </tr>
                      </thead>
                      <tbody class="load-booking">
                        
                        @foreach($booking as $booking)
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3">{{$booking->booking_id}}</i> <strong></strong>
                          </td>
                          <td>{{$booking->booking_quantity}}</td>
                          <td>
                          {{$booking->booking_day}}
                          </td>
                          <td>
                          {{$booking->booking_shift}}
                          </td>
                          <td>
                            @if($booking->booking_pay == 2)
                                Thanh toán VNPAY
                            @elseif($booking->booking_pay == 3)
                                Đã thanh toán
                            @elseif($booking->booking_pay == 1)
                                Thanh toán khi hoàn thành
                            @endif
                        </td>
                          <td>
                          <?php 
                        if($booking->booking_status == 0){
                          echo '<button type="button" class="btn btn-danger">
                          Chưa xác nhận
                        </button>';
                        }
                        elseif($booking->booking_status == 1){
                          echo '<button type="button" class="btn btn-primary" >
                          Đã xác nhận
                        </button>';
                        }
                        elseif($booking->booking_status == 2){
                          echo '<button type="button" class="btn btn-warning" >
                          Đang thực hiện
                        </button>';
                        }
                        elseif($booking->booking_status == 3){
                          echo '<button type="button" class="btn btn-success" >
                          Đã xong
                        </button>';
                        }
                        ?>   
                          </td>
                          <td>
                            <div class="dropdown">
                            <a class="mini-link btn--e-brand-b-2" 
                            href="{{ url('detail-calendar-booking/'.$booking->booking_id.'/'.$booking->service->adminInformation->admin_information_id) }}">
                            Xem chi tiết</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
                </div>
                <div class="col-xl-3">
               
                <!-- Modal -->
                
              </div>
            </div>
            <!-- / Content -->
@endsection