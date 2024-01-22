<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use DB;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\tbl_admin;
use App\Models\tbl_staff;
use App\Models\tbl_admin_information;
use App\Models\tbl_register_staff;
use App\Models\tbl_admin_address;
use Illuminate\Support\Facades\Redirect;
class AccountAdminController extends Controller
{
    public function admin_account(){
        $data = DB::table('tbl_tinhthanhpho')->get();
        return view('admin.admin_account.admin_account')->with('data',$data);
    }
    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key => $province){
                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }else{
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                $output.='<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key => $ward){
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
    }
    public function add_information_account(Request $request){
        $data = $request->all();
        $tbl_admin = new tbl_admin();
        $check = DB::table('tbl_admin')->where('admin_email',$request->admin_email)->count();
       
        if($check == null){
            $tbl_admin->admin_name = $request->admin_name;
        $tbl_admin->admin_password = md5($request->admin_password);
        $tbl_admin->admin_email = $request->admin_email;
        $tbl_admin->admin_status = '2';
        $tbl_admin->save();
        $admin_id = $tbl_admin->admin_id;

        $city = City::where('matp', $data['city'])->get();
        $province = Province::where('maqh', $data['province'])->get();
        $wards = Wards::where('xaid', $data['wards'])->get();

        
        foreach($city as $city){
            $c = $city->name_city;
        }
        foreach($province as $province){
            $p = $province->name_quanhuyen;
        }
        foreach($wards as $wards){
            $w = $wards->name_xaphuong;
        }
      
        $tbl_admin_address = new tbl_admin_address();
        $tbl_admin_address->address_city = $data['city'];
        $tbl_admin_address->address_province = $data['province'];
        $tbl_admin_address->address_wards = $data['wards'];
        $tbl_admin_address->number_address = $data['number_address'];
        $tbl_admin_address->email = $data['email'];
        $tbl_admin_address->admin_address =$data['number_address'] .','. $w . ', ' . $p . ' ' . $c;
        $tbl_admin_address->save();
        $admin_address_id = $tbl_admin_address->admin_address_id;
        
            // Create new tbl_admin_information
            $tbl_admin_information = new tbl_admin_information();
            $tbl_admin_information->admin_id = $admin_id;
            $tbl_admin_information->admin_information_name = $data['admin_information_name'];
            $tbl_admin_information->admin_phone = $data['admin_phone'];
            $tbl_admin_information->admin_introduce = $data['admin_introduce'];
            $tbl_admin_information->open_time = $data['open_time'];
            $tbl_admin_information->close_time = $data['close_time'];
            $tbl_admin_information->admin_address = $admin_address_id;
        
            $get_image = $request->file('admin_image');
            if ($get_image) {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('public/uploads', $new_image);
                $tbl_admin_information->admin_image = $new_image;
                $tbl_admin_information->save();
            }
            $tbl_admin_information->save();
            $admin_information_id = $tbl_admin_information->admin_information_id;
            DB::table('tbl_admin')->where('admin_id', $admin_id)->update(['admin_information_id' => $admin_information_id]);
            return Redirect::to('admin-account');
        }else{
            return Redirect::to('admin-account');
        }

        
        
        // $data = $request->all();
            
            // // Update tbl_admin_address
            // $tbl_admin_address = tbl_admin_address::where('admin_address_id', $admin_address)->first();
            // $tbl_admin_address->address_city = $data['city'];
            // $tbl_admin_address->address_province = $data['province'];
            // $tbl_admin_address->address_wards = $data['wards'];
            // $tbl_admin_address->save();
            // $admin_address_id = $tbl_admin_address->admin_address_id;
        
            // // Update tbl_admin_information
            // $tbl_admin_information = tbl_admin_information::where('admin_id', $admin_id)->first();
            // $tbl_admin_information->admin_information_name = $data['admin_information_name'];
            // $tbl_admin_information->admin_phone = $data['admin_phone'];
            // $tbl_admin_information->admin_introduce = $data['admin_introduce'];
            // $tbl_admin_information->open_time = $data['open_time'];
            // $tbl_admin_information->close_time = $data['close_time'];
        
            // $get_image = $request->file('admin_image');
            // if ($get_image) {
            //     $get_name_image = $get_image->getClientOriginalName();
            //     $name_image = current(explode('.', $get_name_image));
            //     $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            //     $get_image->move('public/uploads', $new_image);
            //     $tbl_admin_information->admin_image = $new_image;
            // }
            // $tbl_admin_information->save();
        
            // return Redirect::to('admin-account');
        
    }
    public function all_basis(){
        $admin_id = Session::get('admin_id');

        $admin_basis = DB::table('tbl_admin_information')->where('admin_id',$admin_id)->get();

        return view('admin.admin_account.all_basis')->with('admin_basis',$admin_basis);
    }
    public function all_account_admin(){
        $admin_id = Session::get('admin_id');
        $admin_staff = '';
        $admin_staff = tbl_admin_information::with(['register_staff' => function($query) {
            $query->where('register_status', 0);
        }])
        ->where('admin_id', $admin_id)
        ->orderBy('created_at', 'desc')->get();

        $admin_information_id = $admin_staff->value('admin_information_id');

        if($admin_id == '6'){
            $tbl_admin = DB::table('tbl_admin')->where('admin_status','2')->get();

            return view('admin.admin_account.all_account_admin')->with('tbl_admin',$tbl_admin)->with('admin_staff',$admin_staff);
        }else{
            $tbl_admin = DB::table('tbl_admin')->where('admin_status','1')->where('admin_information_id',$admin_information_id)->get();

            return view('admin.admin_account.all_account_admin')->with('tbl_admin',$tbl_admin)->with('admin_staff',$admin_staff);
        }

    }
    public function all_account_user(){
        $admin_id = Session::get('admin_id');
        $account_user = DB::table('tbl_user')->get();

        $check = DB::table('tbl_admin')->where('admin_id',$admin_id)->value('admin_status');

        if($check >= '2'){
           
            return view('admin.admin_account.all_account_user')->with('account_user',$account_user);
        }else{
           

            return view('admin.dashboard');
        }
    }
    public function delete_admin($admin_id){
        
         DB::table('tbl_admin_information')->where('admin_id', $admin_id)->delete();
         DB::table('tbl_admin')->where('admin_id',$admin_id)->delete();

        $admin_ids = Session::get('admin_id');
        $admin_staff = tbl_admin_information::with(['register_staff' => function($query) {
            $query->where('register_status', 0);
        }])
        ->where('admin_id', $admin_id)
        ->orderBy('created_at', 'desc')->get();

        if($admin_ids == '6'){
            $tbl_admin = DB::table('tbl_admin')->where('admin_status','2')->get();

            return view('admin.admin_account.all_account_admin')->with('tbl_admin',$tbl_admin)->with('admin_staff',$admin_staff);
        }else{
            $tbl_admin = DB::table('tbl_admin')->where('admin_status','1')->get();
            
            return Redirect::to('all-account-admin');
            
        }
    }
    public function confirm_admin_staff($admin_id){
        $admin_information_id = tbl_register_staff::where('admin_id', $admin_id)->value ('admin_information_id');
        $data['admin_status'] = '1';
        $data['register_status'] = '1';
       
        DB::table('tbl_admin')->where('admin_id',$admin_id)->update([
            'admin_status' => $data['admin_status'],
            'admin_information_id' => $admin_information_id
        ]);
        $admin_name = DB::table('tbl_admin')->where('admin_id', $admin_id)->value('admin_name');

        $tbl_staff = tbl_register_staff::where('admin_id',$admin_id)->update(['register_status' => $data['register_status']]);
        

        $tbl_staff = new tbl_staff();
        $tbl_staff->admin_id = $admin_id;
        $tbl_staff->admin_information_id = $admin_information_id;
        $tbl_staff->staff_name = $admin_name;
        $tbl_staff->save();
        

        return Redirect::to('all-account-admin');
   }
}
