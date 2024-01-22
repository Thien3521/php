<?php

namespace App\Http\Controllers;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\tbl_category;
use App\Models\tbl_service;
use App\Models\tbl_admin_address;
use App\Models\City;
use App\Models\tbl_booking;
use App\Models\tbl_calendar;
use App\Models\tbl_staff;
use App\Models\tbl_endow;
use App\Models\tbl_comment;
use DB;
use App\Models\tbl_admin_information;
class HomeController extends Controller
{
   public function home(){
    $data = City::all();

    $category = tbl_category::where('admin_id','15')->get();
      
    $service = tbl_service::with('category')->get();
    $groupedServices = $service->groupBy('category_id');
    $experience = DB::table('tbl_experience')->get();
    $comment = tbl_comment::with('user')->take('5')->get();
    $basis  = tbl_admin_information::all(); 
    $endow = DB::table('tbl_endow')->get();  
    return view('home.home')->with('category',$category)->with('groupedServices',$groupedServices)->with('endow',$endow)
    ->with('basis',$basis)->with('data',$data)->with('comment',$comment)->with('experience',$experience);
   }
   public function search_service(Request $request) {
    $data = $request->all();
    
    $services = DB::table('tbl_service')
                    ->where('admin_information_id', $request->admin_information_id)
                    ->where('service_name', 'like', '%' . $request->search_name . '%')
                    ->get();
    
    $output = '<div class="row g-4">';
    
    foreach($services as $service) {
        $output .= '
        <div class="col-lg-6">
            <div class="services-item bg-light border-4 border-end border-primary rounded p-4">
                <div class="row align-items-center">
                    <div class="col-8">
                        <div class="services-content text-end">
                            <h3>'.$service->service_name.'</h3>
                            <div id="services-container-'.$service->service_id.'" class="services-container">
                                <p class="service-information" id="service-information-'.$service->service_id.'" style="max-height: 100px; overflow: hidden;">'.$service->service_information.'</p>
                                <button id="view-more-btn-'.$service->service_id.'" onclick="toggleServiceContainer('.$service->service_id.')">Xem thêm</button>
                            </div>
                            <button type="button" data-service_id = "'.$service->service_id.'" 
                            class="btn btn-primary btn-primary-outline-0 rounded-pill py-3 px-5 booking-service" 
                            data-toggle="modal" data-target="#modal">
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
        ';
    }
    
    $output .= '</div>';
    
    return $output;
}
   public function basis_detail(Request $request,$admin_information_id){
    $user = Session::get('user_id');
    $service = tbl_service::with('adminInformation')->with('adminInformation.adminAddress')->first();
    
    $staffs = tbl_staff::where('admin_information_id',$admin_information_id)->get();
    $admin_id = DB::table('tbl_admin')->where('admin_information_id',$admin_information_id)->value('admin_id');
   
      $category = tbl_category::where('admin_id',$admin_id)->get();
      
      $services = tbl_service::with('category')->where('admin_information_id',$admin_information_id)->get();
      $groupedServices = $services->groupBy('category_id');
      $basis  = tbl_admin_information::where('admin_information_id',$admin_information_id)->with('adminAddress')->get(); 
      $staff = tbl_staff::where('admin_information_id',$admin_information_id)->count();
      $service = DB::table('tbl_service')
                            ->where('admin_information_id', $admin_information_id)
                            ->get();
      $combo = DB::table('tbl_combo')->where('admin_information_id',$admin_information_id)->get();
      $combos = DB::table('tbl_combo')->where('admin_information_id',$admin_information_id)->get();
      $endow = DB::table('tbl_endow')->where('admin_information_id',$admin_information_id)->get();
      return view('home.basis_detail')->with('category',$category)->with('basis',$basis)->with('staffs',$staffs)
      ->with('staff',$staff)->with('service',$service)->with('groupedServices',$groupedServices)->with('combo',$combo)
      ->with('combos',$combos)->with('endow',$endow);
     }
     public function load_basis(Request $request){
      $data = $request->all();
      $city = $request->city_id;
      $load_basis = tbl_admin_information::with('adminAddress')
      ->whereHas('adminAddress', function($query) use ($city) {
          $query->where('address_city', $city);
      })
      ->get();
          $output = '<div class="container-fluid team py-5">
          <div class="container py-5">
              <div class="row g-4">';
     
                   foreach($load_basis as $basis) {
                       $output .= '
                    
                        <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="team-item">
                        <a href="'.url('basis-detail/'.$basis->admin_information_id).'">
                            <div class="team-img rounded-top">
                                <img src="'.asset('public/uploads/'.$basis->admin_image).'" class="img-fluid w-100 rounded-top bg-light" alt="">
                            </div>
                            <div class="team-text rounded-bottom text-center p-4">
                                <h3 class="text-white">'.$basis->admin_information_name.'</h3>
                                <p class="mb-0 text-white"><i class="bi bi-geo-alt"></i>'.$basis->adminAddress->admin_address.'</p>
                            </div>  
                        </a>                  
                        </div>
                    </div> ';
                   }
  
      $output .= '</div></div></div>';
  
      return $output;
  }
 
  public function booking_service_b1(Request $request){
    $data = $request->all();
    $user = Session::get('user_id');
    
    $service = tbl_service::with('adminInformation')->with('adminInformation.adminAddress')->where('service_id', $data['service_id'])->first();
    
    if($user == null){
        $output = '
        <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">  
                        <h5 align="center" class="modal-title" id="exampleModalLongTitle">Thông tin đặt lịch</h5>
                    <div class="modal-body">
                    <h5 align="center" class="modal-title" id="exampleModalLongTitle">Bạn cần đăng nhập mới có thể đặt lịch</h5>
                    <div class="modal-footer">
                    <div class="mx-auto"> <!-- Center content horizontally -->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                        <a href="'.url('login-user').'">   <button type="button" class="btn btn-primary" >Đăng nhập</button></a>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
        ';

    return $output;
    }else{
        
        $admin_information_id = $service->admin_information_id;
        $staffs = tbl_staff::where('admin_information_id',$admin_information_id)->get();
        $output = '
        <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  
                        <h5 align="center" class="modal-title" id="exampleModalLongTitle">Thông tin đặt lịch</h5>
                        
                 
                    <div class="modal-body">
                        <form method="POST" action="' . url('/add-category/') . '" enctype="multipart/form-data">
                            ' . csrf_field() . '
                            <div class="row">
                                <div class="col-md-3">
                                    <a class="mini-product__link" href="product-detail.html">
                                        <img width="100px" height="100px" src="' . asset('/public/uploads/' . $service->service_image) . '" alt="">
                                    </a>
                                </div>
                                <div class="col-md-auto">
                                <span class="mini-product__name">
                                Tên dịch vụ : ' . $service->service_name . '</span>
                                <span class="mini-product__name">Địa chỉ : ' . $service->admin_information . '</span>
                                <span class="mini-product__name ">Giá : ' . $service->service_price . ' VNĐ</span>
                              
                                </div>
                                <div class="container">
                                <div class="row">
                                    <div class="col border border-2">
                                    <h6 align="center" class="modal-title" id="exampleModalLongTitle">Nhập thông tin cho dịch vụ</h6>
                                        <div class="mb-3 row">
                                        <label class="form-label" for="basic-default-fullname">Số lượng* </label>
                                            <div class="col-md-8">
                                                <input max="1" min="1" class="form-control booking_quantity" id="booking_quantity" type="number" value="1" id="html5-number-input" />
                                            </div>
                                        </div>
                                                                
                                        <div class="mb-3 row">
                                            <div class="col-md-8    ">
                                            <label for="exampleFormControlSelect1" class="form-label">Chọn nhân viên</label>
                                            <select class="form-select staff_id select-staff" name="staff_id" id="staff_id" aria-label="Default select example">';
                                            foreach($staffs as $staff){
                                                $output .='  <option name="staff_id" value="'.$staff->staff_id.'">'.$staff->staff_name.'</option>';
                                            }
                                            $output .='
                                            </select>
                                            
                                            </div>
                                            <div class="col-md-2">
                                            <label for="exampleFormControlSelect1" class="form-label">Xem</label>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#seen_staff'.$staff->staff_id.'">
                                            Xem 
                                          </button>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="mb-3 row">
                                        <label class="form-label" for="basic-default-fullname">Chọn ngày* </label>
                                        <div class="col-md-8 load-date" id="load-date">
                                    
                                            
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                        <label class="form-label" for="basic-default-fullname">Chọn giờ* </label>
                                            <div class="col-md-9" id ="load-hour">

                                            </div>
                                            <div class="col-md-6 load-slot" id="load-slot"></div>
                                        </div>
                                        <div class="mb-3 row">
                                        <label class="form-label" for="basic-default-fullname">Mã giảm giá</label>
                                            <div class="col-md-5">
                                            <input type="text" class="form-control code" name="code" id="code" placeholder="vd :XH12saHCV" /> 
                                            </div>
                                            <div class="col-md-5">
                                            <button type="button" class="btn btn-primary check-endow" data-admin_information_id = "'.$admin_information_id.'">
                                            <i class="fas fa-question-circle"></i> Kiểm tra
                                          </button>
                                            </div>
                                            <div id="price">
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col border border-2">
                                    <h6 align="center" class="modal-title" id="exampleModalLongTitle">Nhập thông tin cá nhân </h6>
                                        <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Tên* </label>
                                         <input type="text" class="form-control booking_user_name" name="booking_user_name" id="booking_user_name" placeholder="vd : Hồ Ngọc Qúi" />
                                        </div>
                                        <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Email* </label>
                                            <input type="email" class="form-control booking_user_email" id="booking_user_email" placeholder="Email">
                                        </div>
                                        <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Số điện thoại* </label>
                                            <input type="tel" class="form-control booking_user_phone" id="booking_user_phone" placeholder="Số điện thoại">
                                        </div>
                                        <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Ghi chú </label>
                                           
                                                <textarea class="form-control booking_user_note" id="booking_user_note" rows="1"></textarea>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                          
                           <span class="mini-product__name">Chọn hình thức thanh toán *</span>
                           <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio" value = "1" id="radio1"checked>
                            <label class="form-label" for="basic-default-fullname">Thanh toán khi hoàn thành dịch vụ </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio" value = "2" id="radi2" >
                            <label class="form-label" for="basic-default-fullname"> Thanh toán online </label>
                          </div>
                            </div>
                            <div class="modal-footer">
                            <div class="mx-auto"> <!-- Center content horizontally -->
                            <input class="form-control category_id" id="category_id" type="hidden" value="' . $service->category_id . '" />
                            <input class="form-control service_prices" id="service_prices" type="hidden" value="' . $service->service_price . '" />
                            <input class="form-control service_name" id="service_name" type="hidden" value="' . $service->service_name . '" />
                            <input class="form-control service_address" id="service_address" type="hidden" value="' . $service->adminInformation->adminAddress->admin_address_id . '" />
                            <input class="form-control service_image" id="service_image" type="hidden" value="' . $service->service_image . '" />
                            <input class="form-control service_information" id="service_information" type="hidden" value="' . $service->service_information . '" />
                            <input class="form-control user_id" id="user_id" type="hidden" value="' . $user . '" />
                            <input class="form-control admin_service_name" id="admin_service_name" type="hidden" value="' . $service->adminInformation->admin_information_name. '" />
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                <button type="button" class="btn btn-primary booking" data-service_id="'.$service->service_id.'" name="redirect">Đặt lịch</button>
                            </div>
                        </div>
                        
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal thong tin nhan vien -->
        <div class="modal1 fade" id="staff-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="seen_staff'.$staff->staff_id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
        ';

    return $output;
    }
    
}

public function load_slot_day(Request $request){
    $data = $request->all();

    if($data['date'] && $data['time'] != null){
        $booking = tbl_booking::where('booking_day', $data['date'])
        ->where('booking_shiff', '1')
        ->get();
        $bookingcount = $booking->count();
        if($bookingcount ==0){
        $slot =3 - $bookingcount ;
        $output = ' <p> Số lượng còn : ' . $slot . ' </p>';
        }
        if($bookingcount ==1){
        $slot =3 - $bookingcount ;
        $output = ' <p> Số lượng còn : ' . $slot . ' </p>';
        }
        if($bookingcount ==2){
        $slot =3 - $bookingcount ;
        $output = ' <p> Số lượng còn : ' . $slot . ' </p>';
        }
        if($bookingcount ==3){
        $slot =3 - $bookingcount ;
        $output = ' <p> Số lượng còn : ' . $slot . ' </p>';
        }
        else{

        }
        return $output;
    }
    else if($data['date'] != null){
        $output = "Bạn cần chọn thời gian";
        return $output;
    }else{
        $output = "Bạn cần chọn ngày";
        return $output;
    }
    
   }
   public function select_staff(Request $request){
    $data = $request->all();
    $now = Carbon::now('Asia/Ho_Chi_Minh');
    $calendar_dates = tbl_calendar::where('staff_id', $request->staff_id)
        ->where('calendar_day', '>=',$now->format('Y-m-d'))
        ->get();
    $output =' ';
    $printed_dates = []; // Mảng để lưu trữ các ngày đã được in ra
    
    foreach($calendar_dates as $calendar_date){
        // Kiểm tra xem ngày đã được in ra chưa
        if(!in_array($calendar_date->calendar_day, $printed_dates)) {
            // Nếu ngày chưa được in ra, thêm vào mảng và in ra
            $printed_dates[] = $calendar_date->calendar_day;
            $output .= '<input type="radio" class="btn-check check-staff date" name="date" 
            data-check_radio="'.$calendar_date->calendar_day.'" 
            id="date'.$calendar_date->calendar_id.'" 
            autocomplete="off">
            <label class="btn btn-outline-info" for="date'.$calendar_date->calendar_id.'">
            '.$calendar_date->calendar_day.'</label>';
        }
    }
    
    return $output; 
}

    public function check_radio_date(Request $request){
        $data = $request->all();
        $calendar = tbl_calendar::where('staff_id',$data['staff_id'])->where('calendar_day',$data['calendar_day'])
        ->orderBy('calendar_shift')->get();
                
        $booking = DB::table('tbl_booking')
        ->where('booking_day', $data['calendar_day'])
        ->where('staff_id', $data['staff_id'])
        ->get();

        $bookedShifts = [];

        foreach ($booking as $booking) {
        $check_shift = substr($booking->booking_shift, 0, 5);
        $bookedShifts[] = $check_shift;
        }

        $check = DB::table('tbl_booking')
                ->where('staff_id', $data['staff_id'])
                ->get();

        $output1 = '';

        if (!in_array('08:00', $bookedShifts)) {
        $output1 .= '
            <input type="radio" value="08:00" class="btn-check time" id="btn-check-outlined1" name="time" autocomplete="off">
            <label class="btn btn-outline-success" for="btn-check-outlined1">08:00 - 08:30</label>
        ';
        }

        if (!in_array('09:00', $bookedShifts)) {
        $output1 .= '
            <input type="radio" value="09:00" class="btn-check time" id="btn-check-outlined2" name="time" autocomplete="off">
            <label class="btn btn-outline-success" for="btn-check-outlined2">09:00 - 09:30</label>
        ';
        }

        if (!in_array('10:00', $bookedShifts)) {
        $output1 .= '
            <input type="radio" value="10:00" class="btn-check time" id="btn-check-outlined3" name="time" autocomplete="off">
            <label class="btn btn-outline-success" for="btn-check-outlined3">10:00 - 10:30</label>
        ';
        }

        if (!in_array('11:00', $bookedShifts)) {
        $output1 .= '
            <input type="radio" value="11:00" class="btn-check time" id="btn-check-outlined4" name="time" autocomplete="off">
            <label class="btn btn-outline-success" for="btn-check-outlined4">11:00 - 11:30</label>
        ';
        }

        if (!in_array('12:00', $bookedShifts)) {
        $output1 .= '
            <input type="radio" value="12:00" class="btn-check time" id="btn-check-outlined5" name="time" autocomplete="off">
            <label class="btn btn-outline-success" for="btn-check-outlined5">11:30 - 12:00</label>
        ';
        }

        $output2 = '';

        if (!in_array('12:01', $bookedShifts))  {
            $output2 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined6" name="time" autocomplete="off" value="12:01">
                <label class="btn btn-outline-info" for="btn-check-outlined6">12:01 - 12:30</label>
            ';
        }

        if (!in_array('13:00', $bookedShifts))  {
            $output2 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined7" name="time" autocomplete="off" value="13:00">
                <label class="btn btn-outline-info" for="btn-check-outlined7">13:00 - 13:30</label>
            ';
        }

        if (!in_array('14:00', $bookedShifts))  {
            $output2 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined8" name="time" autocomplete="off" value="14:00">
                <label class="btn btn-outline-info" for="btn-check-outlined8">14:00 - 14:30</label>
            ';
        }

        if (!in_array('15:00', $bookedShifts))  {
            $output2 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined9" name="time" autocomplete="off" value="15:00">
                <label class="btn btn-outline-info" for="btn-check-outlined9">15:00 - 15:30</label>
            ';
        }

        if (!in_array('16:00', $bookedShifts))  {
            $output2 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined10" name="time" autocomplete="off" value="16:00">
                <label class="btn btn-outline-info" for="btn-check-outlined10">16:00 - 16:30</label>
            ';
        }

        if (!in_array('16:30', $bookedShifts))  {
            $output2 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined11" name="time" autocomplete="off" value="16:30">
                <label class="btn btn-outline-info" for="btn-check-outlined11">16:30 - 17:00</label>
            ';
        }


        $output3 ='';       
        if (!in_array('17:01', $bookedShifts))  {
            $output3 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined12" name="time" autocomplete="off" value="17:01">
                <label class="btn btn-outline-primary" for="btn-check-outlined12">17:01 - 17:30</label>
            ';
        }
        
        if (!in_array('18:00', $bookedShifts))  {
            $output3 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined13" name="time" autocomplete="off" value="18:00">
                <label class="btn btn-outline-primary" for="btn-check-outlined13">18:00 - 18:30</label>
            ';
        }
        
        if (!in_array('19:00', $bookedShifts))  {
            $output3 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined14" name="time" autocomplete="off" value="19:00">
                <label class="btn btn-outline-primary" for="btn-check-outlined14">19:00 - 19:30</label>
            ';
        }
        
        if (!in_array('20:00', $bookedShifts))  {
            $output3 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined15" name="time" autocomplete="off" value="20:00">
                <label class="btn btn-outline-primary" for="btn-check-outlined15">20:00 - 20:30</label>
            ';
        }
        
        if (!in_array('21:00', $bookedShifts))  {
            $output3 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined16" name="time" autocomplete="off" value="21:00">
                <label class="btn btn-outline-primary" for="btn-check-outlined16">21:00 - 21:30</label>
            ';
        }
        
        if(!in_array('21:30', $bookedShifts))  {
            $output3 .= '
                <input type="radio" class="btn-check time" id="btn-check-outlined17" name="time" autocomplete="off" value="21:30">
                <label class="btn btn-outline-primary" for="btn-check-outlined17">21:30 - 22:00</label>
            ';
        }
        $output ='';
        if($calendar != null){
            foreach($calendar as $calendars){
               if($calendar->count() == '1'){
                    if($calendars->calendar_shift == '1'){
                        
                    return $output1;
                    }
                    if($calendars->calendar_shift == '2'){
                    
                    return $output2;
                    }
                    if($calendars->calendar_shift == '3'){

                    return $output3;
                    }
               }else{
                    if($calendars->calendar_shift == '1'){
                    
                    $output .= $output1;
                    }
                    if($calendars->calendar_shift == '2'){
                       
                    $output .= $output2;
                    }
                    if($calendars->calendar_shift == '3'){
    
                    $output .= $output3;
                    }
               
               }
            }
            return $output;
            
        }else{
            
        }
    }
          
    public function check_endow(Request $request)
    {
        $data = $request->all();

        $check = tbl_endow::where('admin_information_id', $request->admin_information_id)
            ->where('endow_code', $request->code)->where('category_id', $request->category_id)
            ->get();
        $endow = $check->sum('endow');
        
        $price = $request->service_price - $endow;
        $output = '';
        if ($check->isNotEmpty()) {
            $output = 'V';
        } else {
            $output = 'X';
        }

        return response()->json(['status' => $output, 'price' => $price]);
    }
}
