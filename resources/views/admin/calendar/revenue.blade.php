@extends('admin.admin_layout')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-7">
            <div class="card-body">
              <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <!-- Date -->
                    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
                    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
                    <form action="">
                      @csrf
                      <div class="row">
                        <div class="col">
                            <p>Từ ngày</p>
                            <div class="input-group">
                                <input type="date" id="datepicker1" class="form-control" />
                            </div>
                        </div>
                        <div class="col">
                            <p>Đến ngày</p>
                            <div class="input-group">
                                <input type="date" id="datepicker2" class="form-control" />
                            </div>
                        </div>
                    </div>
                      <p></p>
                      <button class="btn btn-primary search" id="search" type="button">Lọc</button>
                    </form>
                    <!-- end Date -->
                  </div>
                  <div class="col-sm">
                    <p>Lọc theo</p>
                    <select class="form-select dashboard-filter" aria-label="Default select example">
                      <option selected>-- Chọn --</option>
                      <option value="7ngay">7 Ngày</option>
                      <option value="thangtruoc">Tháng trước</option>
                      <option value="thangnay">Tháng này</option>
                      <option value="365ngay">365 Ngày</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
            <div class="card-body pb-0 px-0 px-md-4">
              <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Revenue -->
    <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
      <div id="chart" style="height: 250px;"></div>
    </div>
    <!--/ Total Revenue -->
     <!-- Total Revenue -->
     <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
      <div id="load-revenue" class="load-revenue" ></div>
    </div>
    <!--/ Total Revenue -->
  </div>
</div>
@endsection