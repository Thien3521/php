<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Http\Request;
use App\Models\tbl_admin;
use Illuminate\Support\Facades\Session;
class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
         return $next($request);
        }else{
            $adminName = $request->input('admin_email');
            $adminPassword = md5($request->input('admin_password'));
            $result0 = DB::table('tbl_admin')->where('admin_email',$adminName)
            ->where('admin_password',$adminPassword)->where('admin_status','0')->first();
            $result1 = DB::table('tbl_admin')->where('admin_email',$adminName)
            ->where('admin_password',$adminPassword)->where('admin_status','1')->first();
            $result2 = DB::table('tbl_admin')->where('admin_email',$adminName)
            ->where('admin_password',$adminPassword)->where('admin_status','2')->first();
            $result3 = DB::table('tbl_admin')->where('admin_email',$adminName)
            ->where('admin_password',$adminPassword)->where('admin_status','3')->first();
                if($result0){
                    Session::put('admin_email',$result0->admin_email);
                    Session::put('admin_id',$result0->admin_id);
                    Session::put('admin_status',$result0->admin_status);
                    return redirect()->route('admin-staff')->with('message', 'Bạn đã nhập sai mật khẩu hoặc tài khoản.');
                }
                elseif ($result1) {
                    Session::put('admin_email',$result1->admin_email);
                    Session::put('admin_id',$result1->admin_id);
                    Session::put('admin_status',$result1->admin_status);
                    return redirect()->route('admin-staff')->with('message', 'Bạn đã nhập sai mật khẩu hoặc tài khoản.');
                } elseif ($result2) {
                    Session::put('admin_email',$result2->admin_email);
                    Session::put('admin_id',$result2->admin_id);
                    Session::put('admin_status',$result2->admin_status);
                    return $next($request);
                } elseif ($result3) {
                    Session::put('admin_email',$result3->admin_email);
                    Session::put('admin_id',$result3->admin_id);
                    Session::put('admin_status',$result3->admin_status);
                    return redirect()->route('admin-boss')->with('message', 'Bạn đã nhập sai mật khẩu hoặc tài khoản.');
                } 
             else {
                return redirect()->route('login')->with('message', 'Bạn đã nhập sai mật khẩu hoặc tài khoản.');
            }
        }
       
    }
    
      
}
