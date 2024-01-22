    @extends('home.home_layout')
    @section('content')
        <!-- Carousel Start -->
        <div class="container-fluid carousel-header px-0">
            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="{{asset('public/fontend/user/img/carousel-3.jpg')}}" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-primary text-uppercase mb-3">Spa & Trung tâm làm đẹp</h4>
                                <h1 class="display-1 text-capitalize text-dark mb-3">Massage body</h1>
                                <p class="mx-md-5 fs-4 px-4 mb-5 text-dark">Một thuật ngữ chung bao gồm tất cả các loại massage. Bao gồm một loạt các thao tác tác động và tạo áp lực trực tiếp lên các cơ trên cơ thể, trên bề mặt da.</p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn btn-light btn-light-outline-0 rounded-pill py-3 px-5 me-4" href="#">Băt đầu</a>
                                    <button type="button" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-4 ms-4" data-bs-toggle="modal" data-bs-target="#booknow">
                                Đặt Ngay
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('public/fontend/user/img/carousel-2.jpg')}}" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-primary text-uppercase mb-3" style="letter-spacing: 3px;">Spa & Trung tâm làm đẹp</h4>
                                <h1 class="display-1 text-capitalize text-dark mb-3">Điêu trị da mặt</h1>
                                <p class="mx-md-5 fs-4 px-5 mb-5 text-dark"> Cùng trải nghiệm liệu trình điều trị và chăm sóc, tái sinh làn da đặc biệt này nhằm chống lại các dấu hiệu lão hóa</p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn btn-light btn-light-outline-0 rounded-pill py-3 px-5 me-4" href="#">Băt đầu</a>
                                    <button type="button" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-4 ms-4" data-bs-toggle="modal" data-bs-target="#booknow">
                                Đặt Ngay
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('public/fontend/user/img/carousel-1.jpg')}}" class="img-fluid" alt="Image">
                        <div class="carousel-caption">
                            <div class="p-3" style="max-width: 900px;">
                                <h4 class="text-primary text-uppercase mb-3" style="letter-spacing: 3px;">Spa & Trung tâm làm đẹp</h4>
                                <h1 class="display-1 text-capitalize text-dark">Điều trị Cellulite</h1>
                                <p class="mx-md-5 fs-4 px-5 mb-5 text-dark">Những người có vóc dáng cân đối hoặc những người giảm cân không đúng cách cũng có thể gặp phải tình trạng này.</p>
                                <div class="d-flex align-items-center justify-content-center">
                                    <a class="btn btn-light btn-light-outline-0 rounded-pill py-3 px-5 me-4" href="#">Băt đầu</a>
                                    <button type="button" class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-4 ms-4" data-bs-toggle="modal" data-bs-target="#booknow">
                                Đặt Ngay
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->
 
        

      <!-- Gallery Start -->
      <div class="container-fluid gallery py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 800px;">
                    <p class="fs-4 text-uppercase text-primary">Các dịch vụ của chúng tôi</p>
                    <h1 class="display-4 mb-4">Chào mừng bạn đã đến với Spa của chúng tôi</h1>
                </div>
                <div class="tab-class text-center">
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
                        <div id="tab-{{$category_id}}" class="tab-pane fade show p-0 ">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        @foreach($services as $service)
                                        <div class="col-lg-3">
                                            <div class="gallery-img">
                                                <img class="img-fluid rounded w-100" src="{{asset('public/uploads/'.$service->service_image)}}" alt="">
                                                <div class="gallery-overlay p-4">
                                                    <h4 class="text-secondary">{{$service->service_name}}</h4>
                                                </div>
                                                <div class="search-icon">
                                                    <a href="{{asset('public/uploads/'.$service->service_image)}}" data-lightbox="Gallery-1" class="my-auto"><i class="fas fa-search-plus btn-primary btn-primary-outline-0 rounded-circle p-3"></i></a>
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
                </div>
            </div>
        </div>
        <!-- gallery End -->

        <!-- Testimonial Start -->
<div class="container-fluid testimonial py-5">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 800px;">
            <p class="fs-4 text-uppercase text-primary">Các khách hàng đã trải nghiệm</p>
            <h1 class="display-4 mb-4 text-white">Họ đã thay đổi như thế nào!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            @foreach($experience as $experience)
            <div class="testimonial-item rounded">
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-column mx-auto">
                            <div class="rounded-circle mb-4" style="border: dashed; border-color: var(--bs-white);">
                                <img src="{{ asset('public/uploads/'.$experience->user_image1)}}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="text-center">
                                <h4 class="mb-2 text-primary"></h4>
                                <p class="m-0 text-white">Trước</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <h1>
                            <i class="bi bi-caret-right text-white"></i>
                            <i class="bi bi-caret-right text-white"></i>
                            <i class="bi bi-caret-right text-white"></i>
                        </h1>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-column mx-auto">
                            <div class="rounded-circle mb-4" style="border: dashed; border-color: var(--bs-white);">
                                <img src="{{ asset('public/uploads/'.$experience->user_image2)}}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="text-center">
                                <h4 class="mb-2 text-primary"></h4>
                                <p class="m-0 text-white">Sau</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->
   
       <!-- Pricing Start -->
       <div class="text-center mx-auto mb-5" style="max-width: 800px;">        
         <h1 class="display-4 mb-4 ">Các Ưu đãi</h1>
        </div>
        <div class="container-fluid pricing py-4" style="background: var(--bs-primary);">
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
        <!-- Pricing End -->
   
        @endsection

