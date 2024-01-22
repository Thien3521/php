<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\tbl_booking;
use App\Models\tbl_booking_user;
use App\Models\tbl_booking_service;
use App\Models\tbl_information_admin;
use App\Models\tbl_service;
use App\Models\tbl_room;
use App\Models\tbl_statistical;
use Session;
use DB;
use Mail;
class BookingController extends Controller
{
    public function booking_service(Request $request ){

        $data = $request->all();
        $admin = tbl_service::with('adminInformation')->where('service_id',$data['service_id'])->get();
        
        foreach($admin as $admin){
            $admin_id = $admin->adminInformation->admin_id;
            $admin_information_id = $admin->admin_information_id;
        }
        //add tbl_booking_user
        $tbl_booking_user = new tbl_booking_user();
        $tbl_booking_user->bk_user_name = $data['booking_user_name'];
        $tbl_booking_user->bk_user_email = $data['booking_user_email'];
        $tbl_booking_user->bk_user_phone = $data['booking_user_phone'];
        $tbl_booking_user->bk_user_note = $data['booking_user_note'];
        $tbl_booking_user->save();
        $booking_user_id = $tbl_booking_user->booking_user_id;

        //add tbl_booking_service
        $tbl_booking_service = new tbl_booking_service();
        $tbl_booking_service->admin_service_name = $data['admin_service_name'];
        $tbl_booking_service->bk_name = $data['service_name'];
        $tbl_booking_service->bk_image = $data['service_image'];
        $tbl_booking_service->bk_address = $data['service_address'];
        $tbl_booking_service->bk_price = $data['service_price'];
        $tbl_booking_service->bk_information = $data['service_information'];
        $tbl_booking_service->save();
        $booking_service_id = $tbl_booking_service->booking_service_id;

        //add tbl_booking
        $tbl_booking = new tbl_booking();
        $tbl_booking->booking_service_id = $booking_service_id;
        $tbl_booking->user_id = $data['user_id'];
        $tbl_booking->admin_id = $admin_id;
        $tbl_booking->staff_id = $data['staff_id'];
        $tbl_booking->admin_information_id = $admin_information_id;
        $tbl_booking->booking_user_id = $booking_user_id;
        $tbl_booking->booking_quantity = $data['booking_quantity'];
        $tbl_booking->booking_day = $data['date'];
        $tbl_booking->service_id = $data['service_id'];
        $tbl_booking->booking_shift = $data['time'];
        $tbl_booking->booking_price	 = $data['service_price']*$data['booking_quantity'];
        $tbl_booking->booking_pay = $data['pay'];
        $tbl_booking->booking_code = $request->code;
        
        
        
        $tbl_booking->save();
        
        
    }
    public function all_calendar_booking(){
        $admin_id = Session::get('admin_id');
        $staff_id = DB::table('tbl_staff')->where('admin_id',$admin_id)->value('staff_id');
        $booking = tbl_booking::with('booking_service')
        ->with('service.adminInformation')->where('admin_id', $admin_id)->orWhere('staff_id', $staff_id)
        ->orderBy('created_at', 'desc')->take('10')->get();

        

        return view('admin.booking.all_calendar_booking')
        ->with('booking',$booking);
    }
    public function detail_calendar_booking($booking_id, $admin_information_id)
    {
        $admin_id = Session::get('admin_id');
        $admin_information_id = DB::table('tbl_admin')->Where('admin_id',$admin_id)->value('admin_information_id');
        $staff_id = '1';
        $tbl_staff = DB::table('tbl_staff')->where('admin_id', $admin_id)->get();

        if ($tbl_staff->isNotEmpty()) {
            $staff_id = $tbl_staff->first()->staff_id;
        }

        $room = tbl_room::where('admin_information_id', $admin_information_id)->orderBy('created_at', 'desc')->get();
        
        $booking = tbl_booking::with('booking_user')
            ->with('booking_service')
            ->with('service.adminInformation.adminAddress')
            ->where('booking_id', $booking_id)
            ->when(!$tbl_staff->isEmpty(), function ($query) use ($admin_id, $staff_id) {
                return $query->where('staff_id', $staff_id);
            })
            ->get();

        $service = tbl_service::where('admin_information_id', $admin_information_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.booking.detail_calendar_booking')
            ->with('room', $room)
            ->with('booking', $booking)
            ->with('service', $service);
    }
    public function add_status_booking(Request $request,$booking_id){
        $admin_id = Session::get('admin_id');
        $admin_information_id = DB::table('tbl_admin')->where('admin_id',$admin_id)->value('admin_information_id');
       
        $data = array();
        if($request->room_id != null){
            $data['room_id'] = $request->room_id;
            $data['booking_status'] = $request->booking_status;
            $updated = tbl_booking::where('booking_id', $booking_id)
            ->where('admin_information_id', $admin_information_id)
            ->update($data);
        }else if(in_array($request->booking_status, ['1', '2'])){
            $data['booking_status'] = $request->booking_status;
            $updated = tbl_booking::where('booking_id', $booking_id)
            ->where('admin_information_id', $admin_information_id)
            ->update($data);  
        }else if($request->booking_status=='3'){
            $data['booking_status'] = $request->booking_status;
            $updated = tbl_booking::where('booking_id', $booking_id)
            ->where('admin_information_id', $admin_information_id)
            ->update($data);  

           
            $booking = tbl_booking::where('booking_id', $booking_id)->get();
            $DataBooking = array(); // Khởi tạo mảng data ở đây
            
            foreach ($booking as $bookingItem) {
                $data = array();
              
                $data['booking_day'] = $bookingItem->booking_day;
                $data['admin_id'] = $bookingItem->admin_id;
                $data['admin_information_id'] = $bookingItem->admin_information_id;
                $data['revenue'] = $bookingItem->booking_price;
                $data['quantity'] = $bookingItem->booking_quantity;
                $DataBooking[] = $data; // Thêm dữ liệu vào mảng mới
            }
            $statistical = tbl_statistical::where('order_date',$data['booking_day'])->get();
            $check = $statistical->count();
            foreach($statistical as $statistical){
                $total = $statistical->total_order + 1;
                $quantity = $statistical->quantity + $bookingItem->booking_quantity;
                $revenue = $statistical->revenue + $bookingItem->booking_price;
            }
            if($check == '1'){
                $dataSt['revenue'] = $revenue;
                $dataSt['quantity'] = $quantity;
                $dataSt['total_order'] = $total;
                tbl_statistical::where('order_date',$data['booking_day'])
                ->where('admin_information_id',$bookingItem->admin_information_id)->update($dataSt);
            }else{
                foreach ($DataBooking as $dataItem) {
                    $tbl_statistical = new tbl_statistical; // Tạo một instance mới của tbl_statistical
                    
                   
                    $tbl_statistical->order_date = $dataItem['booking_day'];
                    $tbl_statistical->admin_id = $dataItem['admin_id'];
                    $tbl_statistical->admin_information_id = $dataItem['admin_information_id'];
                    $tbl_statistical->revenue = $dataItem['revenue'];
                    $tbl_statistical->quantity = $dataItem['quantity'];
                    $tbl_statistical->total_order = '1';
                    $tbl_statistical->save(); // Lưu dữ liệu vào bảng tbl_statistical
                }   
            }
            
            
        }

        return Redirect::to('all-calendar-booking');
    }
    public function edit_booking_user(Request $request,$booking_user_id,$admin_information_id){
        $data = array();
        $data['bk_user_name'] = $request->bk_user_name;
        $data['bk_user_phone'] = $request->bk_user_phone;
        $data['bk_user_note'] = $request->bk_user_note;
        
        $updated = tbl_booking_user::where('booking_user_id', $booking_user_id)
        ->update($data);
        return Redirect::to('detail-calendar-booking/'.$request->booking_id.'/'.$admin_information_id);
    }
    public function edit_booking_service(Request $request,$booking_service_id){
       
        $service_id = $request->service_id;
        $service = tbl_service::where('service_id',$service_id)->get();
        foreach($service as $service){
            $bk_name = $service->service_name;
            $bk_image = $service->service_image;
            $bk_price = $service->service_price;
            $bk_information = $service->service_information;
            $admin_information_id = $service->admin_information_id;
        }
        
        $data = array();
        $data['bk_name'] = $bk_name;
        $data['bk_image'] = $bk_image;
        $data['bk_price'] = $bk_price;
        $data['bk_information'] = $bk_information;

        $updated_bk_sv = tbl_booking_service::where('booking_service_id', $booking_service_id)
        ->update($data);
        $updated_bk = tbl_booking::where('booking_service_id',$booking_service_id)
        ->update(['booking_price' => DB::raw('booking_quantity *'.$bk_price)]);

        return Redirect::to('detail-calendar-booking/'.$request->booking_id.'/'.$admin_information_id);
    }
    public function edit_booking(Request $request, $booking_id){
        $data = array();
        $data['booking_day'] = $request->booking_day;
        $data['booking_shiff'] = $request->booking_shiff;
        $data['booking_quantity'] = $request->booking_quantity;
    
        $tbl_booking = tbl_booking::with('booking_service')->where('booking_id',$booking_id)->first(); // Retrieving the booking service
        if($tbl_booking){
            $data['booking_price'] = $tbl_booking->booking_service->bk_price * $request->booking_quantity;
        }
    
        $data['room_id'] = null;
        $data['booking_status'] = '0';
    
        $updated = tbl_booking::where('booking_id', $booking_id)
            ->update($data);
            return Redirect::to('all-calendar-booking/');
    }
    public function send_mail_booking(Request $request){
        $admin_id = Session::get('admin_id');
        $admin_information_id = DB::table('tbl_admin')->where('admin_id',$admin_id)->value('admin_information_id');
        

        $data['booking_id'] = $request->booking_id;
        $data['email'] = $request->email;
        $booking = tbl_booking::with('booking_user')
            ->with('booking_service')
            ->with('service.adminInformation.adminAddress')
            ->where('booking_id', $data['booking_id'] )
            ->where('admin_information_id',$admin_information_id)
            ->get();
        $to_name = "Spa PuPu";
        $to_email = $data['email'];
        Mail::send('admin.booking.booking_email', ['booking' => $booking], function ($message) use ($to_email, $to_name,$booking) {
            $message->from('hnqui.19it6@vku.udn.vn', 'Spa PuPu');
            $message->to($to_email, $to_name,$booking);
            $message->subject('Thông báo Đặt lịch thành công');
        });
    }
    public function pay_vnpay(Request $request){
        $data = $request->all();
        $admin = tbl_service::with('adminInformation')->where('service_id',$data['service_id'])->get();
        
        foreach($admin as $admin){
            $admin_id = $admin->adminInformation->admin_id;
            $admin_information_id = $admin->admin_information_id;
        }
        //add tbl_booking_user
        $tbl_booking_user = new tbl_booking_user();
        $tbl_booking_user->bk_user_name = $data['booking_user_name'];
        $tbl_booking_user->bk_user_email = $data['booking_user_email'];
        $tbl_booking_user->bk_user_phone = $data['booking_user_phone'];
        $tbl_booking_user->bk_user_note = $data['booking_user_note'];
        $tbl_booking_user->save();
        $booking_user_id = $tbl_booking_user->booking_user_id;

        //add tbl_booking_service
        $tbl_booking_service = new tbl_booking_service();
        $tbl_booking_service->admin_service_name = $data['admin_service_name'];
        $tbl_booking_service->bk_name = $data['service_name'];
        $tbl_booking_service->bk_image = $data['service_image'];
        $tbl_booking_service->bk_address = $data['service_address'];
        $tbl_booking_service->bk_price = $data['service_price'];
        $tbl_booking_service->bk_information = $data['service_information'];
        $tbl_booking_service->save();
        $booking_service_id = $tbl_booking_service->booking_service_id;

        //add tbl_booking
        $tbl_booking = new tbl_booking();
        $tbl_booking->booking_service_id = $booking_service_id;
        $tbl_booking->user_id = $data['user_id'];
        $tbl_booking->admin_id = $admin_id;
        $tbl_booking->staff_id = $data['staff_id'];
        $tbl_booking->admin_information_id = $admin_information_id;
        $tbl_booking->booking_user_id = $booking_user_id;
        $tbl_booking->booking_quantity = $data['booking_quantity'];
        $tbl_booking->booking_day = $data['date'];
        $tbl_booking->service_id = $data['service_id'];
        $tbl_booking->booking_shift = $data['time'];
        $tbl_booking->booking_price	 = $data['service_price']*$data['booking_quantity'];
        $tbl_booking->booking_pay = $data['pay'];
        $tbl_booking->booking_code = $request->code;
        $tbl_booking->save();
        $booking_id = $tbl_booking->booking_id;
        $booking_price = $tbl_booking->booking_price;

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/doantotnghiep/account-user";
        $vnp_TmnCode = "5OWLAHES";//Mã website tại VNPAY 
        $vnp_HashSecret = "CDCUDAYVORNGAEZLQMGFZXBLSBYUGRFO"; //Chuỗi bí mật

        $vnp_TxnRef = $booking_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toan vnpay';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $booking_price * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        
        //Billing
       
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
            
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            }
  
}
