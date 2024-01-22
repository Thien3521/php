@extends('home.home_layout')
@section('content')
<p>ss</p>
<p></p>
<p>ss</p>
<p></p>
<div class="app-content">
    <!--====== Section 1 ======-->
    <div class="u-s-p-t-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <!--====== service Breadcrumb ======-->
                    <div class="pd-breadcrumb u-s-m-b-30">
                        <ul class="pd-breadcrumb__list">
                            <li class="has-separator">
                                <a href="index.hml">Trang chủ</a>
                            </li>
                            <li class="is-marked">
                                <a href="shop-side-version-2.html">Cửa hàng</a>
                            </li>
                        </ul>
                    </div>

  <!--====== service Detail Zoom ======-->
@foreach($service as $service)
<div class = "content_home">
    <div class="col-md" width="300px ">
        <div
          id="carouselExample-cf"
          class="carousel carousel-dark slide carousel-fade"
          data-bs-ride="carousel"
        >
          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExample-cf" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExample-cf" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExample-cf" data-bs-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100  " height="300px" src="{{ asset('public/fontend/image/1.jpg') }}" alt="First slide" />
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" height="300px" src="{{ asset('public/fontend/image/marie.jpg') }}" width="auth-forgot-password-basic" alt="Second slide" />
             
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" height="300px" src="{{ asset('public/fontend/image/1.jpg') }}" alt="Third slide" />
              
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExample-cf" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample-cf" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
 </div>
                            
                            <!--====== End - service Detail Zoom ======-->
                        </div>
                        
                        <div class="col-lg-7">

                            <!--====== service Right Side Details ======-->
                            <div class="pd-detail">
                                <div>

                                    <span class="pd-detail__name">{{$service->service_name}}</span></div>
                                <div>
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__price">đ {{$service->service_price   }}</span>

                                        <span class="pd-detail__discount">
                                            (<?php $sale = ($service->service_price-$service->service_price)/$service->service_price*100; 
                                            echo number_format($sale,2);?> %)
                                        </span><del class="pd-detail__del">đ {{$service->service_price}}</del></div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                        <span class="pd-detail__review u-s-m-l-4">

                                            <a data-click-scroll="#view-review">23 Reviews</a></span></div>
                                </div>
                               
                                <div class="u-s-m-b-15">

                                    <span class="pd-detail__preview-desc">{{$service->service_information}}</span></div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                            <a href=""></a>

                                            <span class="pd-detail__click-count">(222)</span></span></div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <div class="pd-detail__inline">

                                        <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                            <a href="signin.html">Email me When the price drops</a>

                                            <span class="pd-detail__click-count">(20)</span></span></div>
                                </div>
                                <div class="u-s-m-b-15">
                                    <ul class="pd-social-list">
                                        <li>

                                            <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li>

                                            <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li>

                                            <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li>

                                            <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                        <li>

                                            <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                                <div class="u-s-m-b-15">
                                    <form class="pd-detail__form" method="POST" action="{{ url('/add-cart/'.$service->service_id)}}">
                                    @csrf
                                    <div class="u-s-m-b-15">
                                   
                                      <!-- size -->
                                    
                                    <!-- end size -->
                                    </div>
                                    <div id="load-color-size">
                                            
                                            </div>
                                        <div class="pd-detail-inline-2">
                                            <input type="hidden" value="{{$service->service_id}}" class="cart_service_id_{{$service->service_id}}">
                                            <input type="hidden" value="{{$service->service_name}}" class="cart_service_name_{{$service->service_id}}">
                                            <input type="hidden" value="{{$service->service_image}}" class="cart_service_image_{{$service->service_id}}">
                                            <input type="hidden" value="{{$service->service_price}}" class="cart_service_price_{{$service->service_id}}">
                                            <!-- <input type="hidden" value="1" class="cart_service_qty_{{$service->service_id}}"> -->
                                            <input type="hidden" id = "service-id" value="{{$service->service_id}}" >
                                        </div>

                                          <!-- Vertically Centered Modal -->
                    <div class="col-lg-4 col-md-6">
                      <small class="text-light fw-semibold">Vertically centered</small>
                      <div class="mt-3">
                        <!-- Button trigger modal -->
                        <button
                          type="button"
                          class="btn btn-primary"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter"
                        >
                          Launch modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Thông tin khách hàng</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameWithTitle" class="form-label"></label>
                                    <input
                                      type="text"
                                      id="nameWithTitle"
                                      class="form-control"
                                      placeholder="Enter Name"
                                    />
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                    <label for="emailWithTitle" class="form-label">Email</label>
                                    <input
                                      type="text"
                                      id="emailWithTitle"
                                      class="form-control"
                                      placeholder="xxxx@xxx.xx"
                                    />
                                  </div>
                                  <div class="col mb-0">
                                    <label for="dobWithTitle" class="form-label">DOB</label>
                                    <input
                                      type="text"
                                      id="dobWithTitle"
                                      class="form-control"
                                      placeholder="DD / MM / YY"
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                                    </form>
                                    
                                </div>
                               
                            </div>
                            
                            <!--====== End - service Right Side Details ======-->
                        </div>
                    </div>
                </div>

            </div>

            <!--====== service Detail Tab ======-->
         
            <!--====== End - service Detail Tab ======-->
           
            <!--====== End - Section 1 ======-->
        </div>
        
		
	
        <!--====== End - App Content ======-->
        @endforeach

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<style>
 

h1, h2, h3, h4, h5, h6{
	font-weight: 200;
}

h1{
	text-align: center;
	padding-bottom: 10px;
	border-bottom: 2px solid #2fcc71;
	max-width: 40%;
	margin: 20px auto;
}

/* CONTAINERS */

.container {max-width: 850px; width: 100%; margin: 0 auto;}
.four { width: 20.26%; max-width: 20.26%;}


/* COLUMNS */

.col {
  display: block;
  float:left;
  margin: 1% 0 1% 1.6%;
}

.col:first-of-type { margin-left: 0; }

/* CLEARFIX */

.cf:before,
.cf:after {
    content: " ";
    display: table;
}

.cf:after {
    clear: both;
}

.cf {
    *zoom: 1;
}

/* FORM */

.form .plan input, .form .payment-plan input, .form .payment-type input{
	display: none;
}

.form label{
	position: relative;
	color: #050505;
	background-color: #f6f6f6;
	font-size: 12px;
	text-align: center;
	height: 40px;
	line-height: 40px;
	display: block;
	cursor: pointer;
	border: 3px solid transparent;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

.form .plan input:checked + label, .form .payment-plan input:checked + label, .form .payment-type input:checked + label{
	border: 3px solid #dbcccc;;
	background-color: #c4d6cc;
}

.form .plan input:checked + label:after, form .payment-plan input:checked + label:after, .form .payment-type input:checked + label:after{
	content: "\2713";
    width: 40px;
    height: 40px;
    line-height: 40px;
    /* border-radius: 100%;
    border: 2px solid #ede3e3;
    background-color: #5ce095; */
    z-index: 999;
    position: absolute;
    top: -10px;
    right: -10px;
}

.submit{
	padding: 15px 60px;
	display: inline-block;
	border: none;
	margin: 20px 0;
	background-color: #2fcc71;
	color: #fff;
	border: 2px solid #333;
	font-size: 18px;
	-webkit-transition: transform 0.3s ease-in-out;
	-o-transition: transform 0.3s ease-in-out;
	transition: transform 0.3s ease-in-out;
}

.submit:hover{
	cursor: pointer;
	transform: rotateX(360deg);
}

</style>
@endsection   