<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_admin;
use App\Models\tbl_statistical;
use App\Models\tbl_booking;
use App\Models\tbl_admin_information;
use App\Models\tbl_register_staff;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Session;
use DB;
class AdminController extends Controller
{
    public function admin_dashboard(Request $request){
        $login = tbl_admin::get();
        $admin_id = Session::get('admin_id');
        $admin_information_id = DB::table('tbl_admin')->where('admin_id',$admin_id)->value('admin_information_id');
        
        $amdin_name = $request->admin_name;
        
        $order_count = DB::table('tbl_booking')->where('admin_information_id',$admin_information_id)->count();
        $order_price = DB::table('tbl_booking')->where('admin_information_id',$admin_information_id)->sum('booking_price');
        $order_count_ss = DB::table('tbl_booking')->where('admin_information_id',$admin_information_id)->where('booking_status','3')->count();
        $order_ss_price = DB::table('tbl_booking')->where('admin_information_id',$admin_information_id)->where('booking_status','3')->sum('booking_price');
         return view('admin.dashboard')->with('admin_name',$amdin_name)->with('order_count',$order_count)
         ->with('order_price',$order_price)->with('order_count_ss',$order_count_ss)->with('order_ss_price',$order_ss_price);   
    }
    public function register_admin(){
        return view('admin.login.register_admin');
    }
    public function save_admin_register(Request $request){
        
        $check = DB::table('tbl_admin')->where('admin_email',$request->admin_email)->count();

        if($check == '0' && $request->admin_password == $request->admin_passwords){
            $data = array();
            $data['admin_name'] = $request->admin_name;
            $data['admin_email'] = $request->admin_email;
            $data['admin_password'] = md5($request->admin_password);
            $data['admin_status'] = '0';
            DB::table('tbl_admin')->insert($data);
        } else if($check == '1'){
            $message = "Tài khoản này đã tồn tại";
        }else if($check == '0' && $request->admin_password != $request->admin_passwords){
            $message = "Mật khẩu chưa chính xác";
        }else{
            $message = "Vui lòng nhập đầy đủ các thông tin";
        }
        return Redirect::to('/admin-login'); 
    }
    public function admin_login(){
        return view('admin.login.admin_login');
    }
    public function admin_logout(){
   
        // $this->AuthLogin();
             session::put('admin_name',null);
             session::put('admin_id',null);
             session::put('admin_status',null);
             return Redirect::to('/admin-login');
     }
     public function search_order_revenue(Request $request)
      {
        $admin_id = Session::get('admin_id');
        $tbl_admin_inf = DB::table('tbl_admin_information')->where('admin_id',$admin_id)->get();
        if ($tbl_admin_inf->isNotEmpty()) {
            $admin_information_id = $tbl_admin_inf->first()->admin_information_id;
        }
        $data = $request->all();
        $tbl_statistical = new tbl_statistical();
        $from_date = date('Y-m-d', strtotime($data['date1']));
        $to_date = date('Y-m-d', strtotime($data['date2']));
        $tbl_booking = new tbl_booking();
        $booking = $tbl_booking::whereBetween('booking_day',[$from_date,$to_date])
        ->where('admin_information_id',$admin_information_id)->where('booking_status','3')->orderBy('booking_day','ASC')->get();
        $price = $booking->sum('booking_price');
        $count = $booking->count();

        $search_revenue = tbl_statistical::whereBetween('order_date',[$from_date,$to_date])
        ->where('admin_id',$admin_id)->orderBy('order_date','ASC')->get();
          $chart_data = [];
          foreach ($search_revenue as $revenue) {
              $chart_data[] = array(
                  'order_date' => $revenue->order_date,
                  'revenue' => $revenue->revenue,
                  'quantity' => $revenue->quantity,
                  'total_order' => $revenue->total_order
              );
          }
         $all_revenue = '<div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Danh sách</h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-12">
                                <!-- Bordered Table -->
                                <div class="card">
                                    <h5 class="card-header">Danh sách thống kê</h5>
                                    <div class="card-body">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Mã</th>
                                            <th>Ngày đặt</th>
                                            <th>Thời gian </th>
                                            <th>Giá tiền</th>
                                            <th>Xem chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody class="load-booking">';
                                        
                                        foreach ($booking as $bookingItem) {
                                            $all_revenue .= '<tr>
                                                <td>
                                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>' . $bookingItem->booking_id . '</strong>
                                                </td>
                                                <td>' . $bookingItem->booking_day . '</td>
                                                <td>' . $bookingItem->booking_shift . '</td>
                                                <td>' . number_format($bookingItem->booking_price) . ' VNĐ</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="mini-link btn--e-brand-b-2" href="' . url('detail-calendar-booking/'.$bookingItem->booking_id.'/'.$bookingItem->service->adminInformation->admin_information_id) . '">
                                                            Xem chi tiết
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>';
                                        }

                            $all_revenue .= '</tbody>
                                            <i class="fab fa-angular fa-lg text-danger me-3">
                                            <p> Tổng tiền :' . number_format($price) . ' VNĐ</p></i> <strong></strong>
                                            <i class="fab fa-angular fa-lg text-danger me-3"><p>Tổng đơn :' . $count . '</p></i> <strong></strong>
                                            
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                    <!--/ Bordered Table -->
                                    </div>
                                    <div class="col-xl-3">
                                    </div>
                                </div>
                                <!-- / Content -->
                                </div>';
         
            $data = [
                'chart_data' => $chart_data,
                'all_revenue' => $all_revenue
              ];
        
          echo json_encode($data);
         
      }
      public function chart_day(Request $request)
      {
        $data = $request->all();
        $admin_id = Session::get('admin_id');
        $tbl_admin_inf = DB::table('tbl_admin_information')->where('admin_id',$admin_id)->get();
        if ($tbl_admin_inf->isNotEmpty()) {
            $admin_information_id = $tbl_admin_inf->first()->admin_information_id;
        }
        
        $tbl_statistical = new tbl_statistical();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $day60 = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString(); 
        $search_revenue = tbl_statistical::whereBetween('order_date',[$day60,$now])
        ->where('admin_information_id',$admin_information_id)->orderBy('order_date','ASC')->get();
        
          $chart_data = [];
          foreach ($search_revenue as $revenue) {
              $chart_data[] = array(
                'order_date' => $revenue->order_date,
                'revenue' => $revenue->revenue,
                'quantity' => $revenue->quantity,
                'total_order' => $revenue->total_order
              );
          }
         echo $data = json_encode($chart_data);
         
      }
      public function dashboard_filter(Request $request)
      {
        $admin_id = Session::get('admin_id');
        $tbl_admin_inf = DB::table('tbl_admin_information')->where('admin_id',$admin_id)->get();
        if ($tbl_admin_inf->isNotEmpty()) {
            $admin_information_id = $tbl_admin_inf->first()->admin_information_id;
        }
        
        $tbl_statistical = new tbl_statistical();
        $tbl_booking = new tbl_booking();
        $data = $request->all();
        // $now1 = Carbon::now('Asia/Ho_Chi_Minh');
        // $now2 = Carbon::now('Asia/Ho_Chi_Minh');
        // $now3 = Carbon::now('Asia/Ho_Chi_Minh');
        $first_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $first_last_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->subMonth()->toDateString();
        $end_first_lastmonth = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $sub_7day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub_365day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if($data['dashboard_value']=='7ngay'){
            $get = $tbl_statistical::whereBetween('order_date',[$sub_7day,$now])
            ->where('admin_information_id',$admin_information_id)->orderBy('order_date','ASC')->get();

            $booking = $tbl_booking::whereBetween('booking_day',[$sub_7day,$now])
            ->where('admin_information_id',$admin_information_id)->orderBy('booking_day','ASC')->get();
            $price = $booking->sum('booking_price');
            $count = $booking->count();
        }
        elseif($data['dashboard_value']=='thangtruoc'){
            $get = $tbl_statistical::whereBetween('order_date',[$first_last_month,$end_first_lastmonth])
            ->where('admin_information_id',$admin_information_id)->orderBy('order_date','ASC')->get();

            $booking = $tbl_booking::whereBetween('booking_day',[$first_last_month,$end_first_lastmonth])
            ->where('admin_information_id',$admin_information_id)->orderBy('booking_day','ASC')->get();
            $price = $booking->sum('booking_price');
            $count = $booking->count();
        }
        elseif($data['dashboard_value']=='thangnay'){
            $get = $tbl_statistical::whereBetween('order_date',[$first_month,$now])
            ->where('admin_information_id',$admin_information_id)->orderBy('order_date','ASC')->get();

            $booking = $tbl_booking::whereBetween('booking_day',[$first_month,$now])
            ->where('admin_information_id',$admin_information_id)->orderBy('booking_day','ASC')->get();
            $price = $booking->sum('booking_price');
            $count = $booking->count();

        }
        elseif($data['dashboard_value']=='365ngay'){
            $get = $tbl_statistical::whereBetween('order_date',[$sub_365day,$now])
            ->where('admin_information_id',$admin_information_id)->orderBy('order_date','ASC')->get();

            $booking = $tbl_booking::whereBetween('booking_day',[$sub_365day,$now])
            ->where('admin_information_id',$admin_information_id)->orderBy('booking_day','ASC')->get();
            $price = $booking->sum('booking_price');
            $count = $booking->count();
        }
       
        $chart_data = [];
          foreach ($get as $revenue) {
              $chart_data[] = array(
                'order_date' => $revenue->order_date,
                'revenue' => $revenue->revenue,
                'quantity' => $revenue->quantity,
                'total_order' => $revenue->total_order
              );
          }
          $all_revenue = '<div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span>Danh sách</h4>

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl-12">
                                <!-- Bordered Table -->
                                <div class="card">
                                    <h5 class="card-header">Danh sách thống kê</h5>
                                    <div class="card-body">
                                    <div class="table-responsive text-nowrap">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                            <th>Mã</th>
                                            <th>Ngày đặt</th>
                                            <th>Thời gian </th>
                                            <th>Giá tiền</th>
                                            <th>Xem chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody class="load-booking">';
                                        
                                        foreach ($booking as $bookingItem) {
                                            $all_revenue .= '<tr>
                                                <td>
                                                    <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>' . $bookingItem->booking_id . '</strong>
                                                </td>
                                                <td>' . $bookingItem->booking_day . '</td>
                                                <td>' . $bookingItem->booking_shift . '</td>
                                                <td>' . number_format($bookingItem->booking_price) . ' VNĐ</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="mini-link btn--e-brand-b-2" href="' . url('detail-calendar-booking/'.$bookingItem->booking_id.'/'.$bookingItem->service->adminInformation->admin_information_id) . '">
                                                            Xem chi tiết
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>';
                                        }

                            $all_revenue .= '</tbody>
                                            <i class="fab fa-angular fa-lg text-danger me-3">
                                            <p> Tổng tiền :' . number_format($price) . ' VNĐ</p></i> <strong></strong>
                                            <i class="fab fa-angular fa-lg text-danger me-3"><p>Tổng đơn :' . $count . '</p></i> <strong></strong>
                                            
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                    <!--/ Bordered Table -->
                                    </div>
                                    <div class="col-xl-3">
                                    </div>
                                </div>
                                <!-- / Content -->
                                </div>';
         
            $data = [
                'chart_data' => $chart_data,
                'all_revenue' => $all_revenue
              ];
        
          echo json_encode($data);
         
      }
      public function admin_staff(){
       $city = DB::table('tbl_tinhthanhpho')->get();
        return view('admin.admin_staff')->with('city',$city);
      }
      public function admin_boss(){
        $city = DB::table('tbl_tinhthanhpho')->get();
         return view('admin.admin_boss');
       }
      public function load_basis_spa(Request $request){
        $data = $request->all();
        $data['city_id'] = $request->city_id;
        $load_basis = tbl_admin_information::join('tbl_admin_address', 'tbl_admin_information.admin_address', '=', 'tbl_admin_address.admin_address_id')
        ->where('tbl_admin_address.address_city', $data['city_id'])
        ->get();
        
        $output = '  <label for="exampleFormControlSelect1" class="form-label">Chọn địa chỉ</label>
        <select class="form-select select-address" name="basis" id="basis"  aria-label="Default select example">';

        foreach($load_basis as $basis) {
            $output .= '
            <option name="basis" value="'.$basis->admin_information_id.'">'.$basis->admin_information_name.'</option>';
        }
        $output .= '</select> ';
        echo $output;
    
       
    }
    public function load_register_staff(){
        $staff_id = Session::get('admin_id');
        $register_staff = DB::table('tbl_register_staff')
        ->where('tbl_register_staff.admin_id', $staff_id)
        ->join('tbl_admin_information', 'tbl_register_staff.admin_information_id', '=', 'tbl_admin_information.admin_information_id')
        ->get();

        $output = ' <div class="card-body">
        <div class="table-responsive text-nowrap">
        <div class="card">
                <h5 class="card-header">Các yêu cầu</h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                      <tr>
                      <th>Cơ sở spa</th>
                      <th>Địa chỉ</th>
                      <th>Trạng thái</th>
                      <th>Chỉnh sửa</th>
                      </tr>
                      </thead>
                    
                        ';

        foreach($register_staff as $register_staff) {
            $status = ($register_staff->register_status == 0) ? 'ĐANG CHỜ' : ''; // Kiểm tra giá trị của register_status
            $output .= ' <tbody>
                        <td>'.$register_staff->admin_information_name.'</td>
                        <td>'.$register_staff->admin_information_name.'</td>
                        <td>'.$status.'</td>
                        <td><button type="button" class="btn btn-primary " name=""> XÓA</button></td>
                        </tbody>
            ';
        }
        $output .= '  
                
            
            
            
            </table>
        </div>
        </div>
        </div>
        </div>
        </div>';
        echo $output;
    }
    public function add_register_staff(Request $request){
        $staff_id = Session::get('admin_id');
        $tbl_register_staff = new tbl_register_staff();
        
        $tbl_register_staff->admin_id = $staff_id;
        $tbl_register_staff->admin_information_id = $request->basis;
        $tbl_register_staff->register_status = '0';
        
        $tbl_register_staff->save();

    }
    public function revenue(){
        return view('admin.calendar.revenue');
    }
    
}
