<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_user;
use App\Models\tbl_booking;
use App\Models\tbl_booking_user;
use App\Models\tbl_service;
use Session;
use Illuminate\Support\Facades\Redirect;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('home.login_user');
    }

    public function login(Request $request)
    {
        $email = $request->user_email;
        $password = md5($request->user_password);
        
        $user = tbl_user::where('user_email', $email)->where('user_password', $password)->first();
        
        if ($user) {
           Session::put('user_id', $user->user_id);
           Session::put('user_name', $user->user_name);
           return redirect('home');
        } else {
            return redirect('login-user');
            
        }
    }
    public function load_login()
    {   
        $user_id = Session::get('user_id');
        $user_name = Session::get('user_name');
        $booking = tbl_booking::with('booking_user')
        ->with('booking_service')
        ->with('service.adminInformation')
        ->with('service.adminInformation.adminAddress')->where('user_id', $user_id)->get();
       
        if($user_id != null){
            $output = '
            <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tài khoản '.$user_name.'</a>
            <div class="dropdown-menu m-0 bg-secondary rounded-0">
            <a href="'.url('account-user').'" class="dropdown-item">Trang cá nhân</a>
            <a href="'.url('logout').'" class="dropdown-item">Đăng xuất</a>
            </div>
        </div>';

            
            echo $output;
            
        }
        else{
            $output = '
            <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tài khoản</a>
            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                <a href="'.url('login-user').'" class="dropdown-item">Đăng nhập</a>
                
            </div>
        </div> ';
            echo $output;
        }
       
    }
    

      
    

    public function logout()
    {
        Session::put('user_id',null);
        Session::put('user_name',null);
        return Redirect::to('/login-user');
    }
    public function register_user(Request $request)
    {  
       $data = array();
       $data['user_name'] = $request->user_name;
       $data['user_email'] = $request->user_email;
       $data['user_password'] = md5($request->user_password);
       
       $user = tbl_user::where('user_email',$data['user_email'])->count();

       if($user >= 1 ){
        return response()->json(['message_email' => 'Tài khoản này đã tồn tại!']);
       }else{
        if($request->user_password == $request->retype_user_password){
            $newUser = tbl_user::create($data);
            $tbl_user = tbl_user::where('user_email',$data['user_email'])->get();
            foreach($tbl_user as $tbl_user){
                $user_id   = $tbl_user->user_id;
                $user_name = $tbl_user->user_name;
            }
            Session::put('user_id',$user_id);
            Session::put('user_name',$user_name);
            
            return response()->json(['redirect_url' => url('home')]);
        }else{
            return response()->json(['message_password' => 'Bạn cần nhập mật khẩu chính xác!']);
        }
       }
      
       
       
        
    }
}
