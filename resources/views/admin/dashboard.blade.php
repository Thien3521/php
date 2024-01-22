@extends('admin.admin_layout')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                      
                        <div class="card-body">
                         
                        <div class="container">
                          <div class="row">
                            
                       <!-- Date -->
                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                        <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
                        <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
                        <form action="">
                        @csrf
                        
                        
                    
                            <div class="col-sm">
                            <p> Lọc theo</p>
                            <select class="form-select dashboard-filter" aria-label="Default select example">
                                <option selected > -- Chọn -- </option>
                                <option value="7ngay">7 Ngày</option>
                                <option value="thangtruoc">Tháng trước</option>
                                <option value="thangnay">Tháng này</option>
                                <option value="365ngay">365 Ngày</option>
                              </select>
                            </div>
                            </form>
                          </div>
                        </div>
                        </div>
                      
                      </div>
                      
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="../assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt=""
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="{{ asset('public/backend/assets/img/cart.jpg') }}"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">Xem</a>
                                <a class="dropdown-item" href="javascript:void(0);">Xóa</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Tổng số đơn </span>
                          <h3 class="card-title mb-2">
                           
                          </h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>{{ $order_count }} Đơn</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="{{ asset('public/backend/assets/img/dola.jpg') }}"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="javascript:void(0);">Xem</a>
                                <a class="dropdown-item" href="javascript:void(0);">Xóa</a>
                              </div>
                            </div>
                          </div>
                          <span>Tổng tiền</span>
                          <h3 class="card-title text-nowrap mb-1">
                          
                          </h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> {{$order_price}} VNĐ</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                <div id="chart" style="height: 250px;"></div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                         
                          <span class="d-block mb-1">Các đơn hàng hoàn thành  </span>
                          <h3 class="card-title text-nowrap mb-2">
                          
                          </h3>
                          <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> {{$order_count_ss}} Đơn</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                         
                          <span class="fw-semibold d-block mb-1">Doanh thu</span>
                          <h3 class="card-title mb-2">{{$order_ss_price}} VNĐ</h3>
                          <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> </small> -->
                        </div>
                      </div>
                    </div>
                    <!-- </div>2022
    <div class="row"> -->
                   
                  </div>
                </div>
              </div>              

@endsection    

