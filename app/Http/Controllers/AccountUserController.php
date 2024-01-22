<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\tbl_booking_service;
use App\Models\tbl_booking_user;
use App\Models\tbl_booking;
use App\Models\tbl_staff;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AccountUserController extends Controller
{
    public function load_message_user(Request $request){

        $decoded_texts = $request->message_user;
       return $decoded_texts;
    }
    public function chat_bot(Request $request){
        $decoded_texts = $request->message_user;
        $pythonExecutablePath = 'C:\Users\Admin\AppData\Local\Programs\Python\Python312\python.exe';
        $pythonScriptPath = 'C:\xampp\htdocs\doantotnghiep\public\python\main.py';
        
        $process = new Process([$pythonExecutablePath, $pythonScriptPath, $decoded_texts]);
        $process->run();
    
        // error handling
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    
        $output_data = $process->getOutput();
        
        $output_html = base64_decode($output_data);
     
        return $output_html;
    }
    
   
    public function account_user(){
        $user_id = Session::get('user_id');
        $account = DB::table('tbl_user')->where('user_id',$user_id)->get();
        $booking_user = tbl_booking::with('booking_service')
        ->with('booking_user')
        ->with('rooms')
        ->with('adminstaff.admins')
        ->with('service.adminInformation')
        ->with('service.adminInformation.adminAddress')
        ->where('user_id', $user_id)
        ->take('4')
        ->orderByDesc('booking_id')
        ->get();
        return view('home.account.account')->with('account',$account)->with('booking_user',$booking_user);
    }
    public function update_image_user(Request $request)
    {
        $user_id = Session::get('user_id');
        $data = $request->all();
        $get_image = $request->file('user_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads', $new_image);
            DB::table('tbl_user')->where('user_id', $user_id)->update(['user_image' => $new_image]);
        }
    }
    public function find_password(Request $request)
    {
        $data = $request->all();
        $user_id = Session::get('user_id');
        $to_name = "Spa PuPu";
        $to_email = $data['gmail'];
        $min = 000000; // Giá trị nhỏ nhất có thể sinh ra (6 chữ số)
        $max = 999999; // Giá trị lớn nhất có thể sinh ra (6 chữ số)
        $randomNumber = mt_rand($min, $max);
        $to_code = $randomNumber;
        DB::table('tbl_user')->where('user_id', $user_id)->update(['code' => $randomNumber]);
        Mail::send('home.account.email', ['to_code' => $to_code], function ($message) use ($to_email, $to_name,$to_code) {
            $message->from('hnqui.19it6@vku.udn.vn', 'Spa PuPu');
            $message->to($to_email, $to_name,$to_code);
            $message->subject('Mã tìm lại mật khẩu của bạn');
        });
    }
    public function check_code(Request $request)
    {
        $data = $request->all();
        $code = DB::table('tbl_user')->where('user_id', $data['user_id'])->value('code');
    
        if ($code == $data['code']) { // Use '==' for comparison instead of '='
            return response()->json(['status' => 'success', 'message' => '
        <div class="mb-3">
            <label for="inputNewPassword" class="form-label">Nhập mật khẩu mới</label>
            <input type="password" class="form-control"  id="new_password" name="new_password">
        </div>
        <div class="mb-3">
            <label for="inputConfirmPassword" class="form-label">Nhập lại mật khẩu mới</label>
            <input type="password" class="form-control" id="new_passwords" name="new_passwords">
        </div>
        <button type="submit" class="btn btn-info">Lưu</button>'
    ]); // Return JSON response for success
            
        } else {
            return response()->json(['status' => 'error', 'message' => 'Sai code']); // Return JSON response for error
        }
    }
    public function new_password(Request $request)
    {
        $user_id = Session::get('user_id');
        $data = array();
        $data['code'] = $request->code;
        $data['user_password'] = $request->new_password;
        $data['user_passwords'] = $request->new_passwords;
    
        $code = DB::table('tbl_user')->where('user_id', $user_id)->value('code');
        if ($code = $data['code'] && $data['user_password'] == $data['user_passwords']) {
            DB::table('tbl_user')->where('user_id', $user_id)->update([
                'user_password' => md5($data['user_password']),
                'code' => ''
            ]);
            
            return redirect()->to('account-user');
           
        } else {
            // Handle incorrect code or mismatched passwords
        }
    
       
    }
}
