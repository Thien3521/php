@extends('home.home_layout')
@section('content')
@foreach($basis as $basis)
<!-- Header Start -->
<div class="container-fluid bg-breadcrumb py-5">
        <div class="container text-center py-5">
            <h3 class="text-white display-3 mb-4">Spa PuPu</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{url('home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active text-white">Spa PuPu</li>
            </ol>    
        </div>
    </div>
<!-- Header End -->
   <!-- About Start -->
   <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="video">
                            <img src="{{asset('public/uploads/'.$basis->admin_image)}}" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div>
                            <p class="fs-4 text-uppercase text-primary">Giới thiệu</p>
                            <h1 class="display-4 mb-4">Spa, Làm đẹp & Trung tâm chăm sóc da</h1>
                            <h5 class="mb-2"><i class="bi bi-geo-alt "></i> Địa chỉ :  {{$basis->adminAddress->admin_address}}
                            </h5>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                    <i class="bi bi-alarm fa-3x text-info"></i>
                                        <div class="ms-4">
                                            <h5 class="mb-2">Giờ mở cửa</h5>
                                            <p class="mb-0">8h30</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                    <i class="bi bi-alarm-fill fa-3x text-info"></i>
                                        <div class="ms-4">
                                            <h5 class="mb-2">Giờ đóng cửa</h5>
                                            <p class="mb-0">10h00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="my-4"><i class="bi bi-people-fill fa-3x text-info"></i> Số lượng nhân viên : {{$staff}}  
                            <button type="button" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-5" 
                            data-bs-toggle="modal" data-bs-target="#staff{{$basis->admin_information_id}}">Xem chi tiết</button>
                            </p>
                            
                        </div>
                      
                    </div> 
                </div>
            </div>
        </div>
        <!-- Modal staff-->
        <div class="modal fade" id="staff{{$basis->admin_information_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <!-- Team Start -->
        <div class="container-fluid team py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 800px;">
            <h1 class="display-4 mb-4">Nhân viên</h1>
        </div>
            <div class="row g-4">
            @foreach($staffs as $staff)
            <div class="col-lg-3">
                <div class="service-i bg-light border-4 border-end border-primary rounded p-4">
                    <div class="row align-items-center">
                         <div class="col-4-center">
                            <div class="services-img d-flex align-items-center justify-content-center rounded">
                                <img src="{{asset('public/uploads/'.$staff->staff_image)}}" class="img-fluid rounded" alt="">
                            </div>
                            <h4 class="text-center"><span class="text-danger">{{$staff->staff_name}}</span></h4>
                            <button type="button" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-5 booking-service text-center">
                                        Xem chi tiết
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div> 
        </div>
        <!-- Team End -->
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
        </div>
        <!-- ưu đãi -->
        
        <!-- hết ưu đãi -->
          <!-- Services Start -->
          <div class="container-fluid services py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 800px;">
                    <p class="fs-4 text-uppercase text-center text-primary">Danh sách dịch vụ</p>
                    <h1 class="display-3">Spa PuPu & Các dịch vụ tốt nhất dành cho bạn</h1>
                </div>
                <div class="container-fluid gallery py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3 search-service" data-admin_information_id="{{$basis->admin_information_id}}" id="search_name" placeholder="Dịch vụ bạn cần tìm ?" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                        
                    </div>
                    <div class="load-search"></div>
                    <hr>
                    <p class="fs-4 text-uppercase text-center text-primary">Chọn theo danh mục</p>
                    <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
                        @foreach($category as $category)
                        <li class="nav-item">
                            <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill " data-bs-toggle="pill" href="#tab-{{$category->category_id}}">
                                <span class="text-dark" style="width: 150px;">{{$category->category_name}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    
                    <div class="tab-content">
                    @foreach($groupedServices as $category_id => $services)
                        <div id="tab-{{$category_id}}" class="tab-pane fade show p-0 {{ $loop->first ? 'active' : '' }}">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    @foreach($services as $services)
                                    @csrf
                                        <div class="col-lg-6">
                                            <div class="service-i bg-light border-4 border-end border-primary rounded p-4">
                                                <div class="row align-items-center">
                                                    <div class="col-8">
                                                        <div class="services-content text-end">
                                                            <h3>{{$services->service_name}}</h3>
                                                            <div id="services-container-{{ $services->service_id }}" class="services-container">
                                                                <p class="service-information" id="service-information-{{ $services->service_id }}" style="max-height: 100px; overflow: hidden;">{{ $services->service_information }}</p>
                                                                <a id="view-more-btn-{{ $services->service_id }}" onclick="toggleServiceContainer({{ $services->service_id }})">Xem thêm</a>
                                                            </div>
                                                            <h3><span class="text-danger">{{number_format($services->service_price)}} VNĐ</span></h3>
                                                            <button type="button" data-service_id = "{{$services->service_id}}" 
                                                            class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-5 booking-service" 
                                                            data-bs-toggle="modal" data-bs-target="#modal">
                                                                    Đặt lịch
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="services-img d-flex align-items-center justify-content-center rounded">
                                                            <img src="https://cdn.diemnhangroup.com/seoulacademy/spa-co-nhung-dich-vu-gi-1.jpg" class="img-fluid rounded" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <hr>
                    <div class="mx-auto text-center mb-5" style="max-width: 800px;">
                        
                        <h1 class="display-3">Các ưu đãi tốt nhất dành cho bạn</h1>
                    </div>
                    <p class="fs-4 text-uppercase text-center text-primary">Xem các ưu đãi</p>
                    <div class="container py-4">
                    <div class="owl-carousel pricing-carousel">
                        @foreach($endow as $endow)
                        <div class="pricing-item position-relative">
                            <img class="rounded" src="{{asset('public/uploads/'.$endow->endow_image)}}" alt="">
                            <div class="row d-flex align-items-center"> 
                                <div class="col-8 mt-2">
                                    <p>{{$endow->endow_name}}</p>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-info">Chi tiết</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                </div>
                </div>    
            </div>
        </div>
        <!-- Services End -->
        <input type="hidden" id="admin_information_id" value = "{{$basis->admin_information_id}}">
        
        <section class="gradient-custom">
            <div class="container my-5 py-5">
                <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-8">
                    <div class="card">
                    <div class="card-body p-4">
                        <h4 class="text-center mb-4 pb-2">Các bình luận của khách hàng</h4>
                        <div class="row">
                        <div class="col">
                            <div class = "load-comment"></div>
                        </div>
                        </div>
                    </div>
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <div class="d-flex flex-start w-100">
                        <img class="rounded-circle shadow-1-strong me-3"
                    src="https://hocdohoacaptoc.com/storage/2022/02/avata-dep-nam-2.jpg" alt="avatar" width="65"
                    height="65" />
                        <div class="form-outline w-100">
                            <textarea class="form-control" id="comment" rows="4"
                            style="background: #fff;"></textarea>
                        
                        </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                        <button type="button" class="btn btn-primary btn-sm add-comment" data-admin_information_id= "{{$basis->admin_information_id}}">Bình luận</button>
                        
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
  
    </section>


@endforeach
@endsection


<style>
      .shop-w__category-list {
    overflow: auto;
    max-height: 700px; }

    #services-container {
        max-height: 100px;
        overflow: hidden;
        position: relative;
    }
    
    .service-information {
        max-height: 100px;
        margin: 0;
        padding: 0;
    }
    
    #view-more-btn {
        position: absolute;
        bottom: 0;
        right: 0;
        display: none;
    }
    .service-i:hover {
    /* Thêm các thuộc tính CSS ở đây để tạo hiệu ứng hover */
    /* Ví dụ: */
    background-color: yellow;
    color: black;
    border: 2px solid black;
}



</style>