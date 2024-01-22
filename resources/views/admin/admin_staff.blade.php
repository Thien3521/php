@extends('admin.admin_staff_layout')
@section('content')
<div class= "load-register-staff"></div>
<div class="container-xxl flex-grow-1 container-p-y">
<h3>Bạn cần chọn cơ sở Spa làm việc</h3>
    <!-- Basic Layout -->
    <div class="row">
    <div class="col-xl-12">
        <!-- Bordered Table -->
    <div class="card">
    <h5 class="card-header">Bảng danh mục</h5>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
        <div class="modal-body">
            <form method="POST" action="{{url('/add-register-staff')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Chọn địa chỉ</label>
                <select class="form-select select-address" name="city" id="city"  aria-label="Default select example">
                @foreach($city as $city)
                <option name="city" value="{{$city->matp}}">{{$city->name_city}}</option>
                @endforeach
                </select>
            </div>
            <div class="mb-3 load-basis-spa">
            
            </div>
            <div class="modal-footer center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary add-register-staff" name="">Xác nhận</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection    