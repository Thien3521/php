<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\tbl_staff;
use App\Models\tbl_admin_information;
use Session;
use DB;
class ExperienceController extends Controller
{ 
    public function add_experience(Request $request){
    $admin_id = Session::get('admin_id');
    $admin_information_id = DB::table('tbl_admin')->where('admin_id',$admin_id)->value('admin_information_id');
    $data = array();
    $data['user_name'] = $request->user_name;
    $data['admin_information_id'] = $admin_information_id;
    $data['service_name'] = $request->service_name;
    $get_image = $request->file('user_image1');    
    $get_image2 = $request->file('user_image2');  

    if($get_image){
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('public/uploads',$new_image);
        $data['user_image1'] = $new_image;
    
    }   
    if($get_image2){
        $get_name_image = $get_image2->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image =  $name_image.rand(0,99).'.'.$get_image2->getClientOriginalExtension();
        $get_image2->move('public/uploads',$new_image);
        $data['user_image2'] = $new_image;
    
    } 
    DB::table('tbl_experience')->insert($data); 
    return Redirect::to('all-experience');
}
    public function all_experience(){
        $admin_id = Session::get('admin_id');
        $admin_information_id = tbl_admin_information::where('admin_id',$admin_id)->value('admin_information_id');
        $service = DB::table('tbl_service')->where('admin_information_id',$admin_information_id)->get();
        return view('admin.experience.all_experience')->with('service',$service);
    }
    public function load_experience(Request $request)
{
    $admin_id = Session::get('admin_id');
    $admin_information_id = DB::table('tbl_admin')->where('admin_id',$admin_id)->value('admin_information_id');
    $experience = DB::table('tbl_experience')->where('admin_information_id',$admin_information_id)->get();
    $output = '';
    
    
    foreach($experience as $experience) {
        $output .= '<tr>
            <td>
                <i class="fab fa-angular fa-lg text-danger me-3">'.$experience->experience_id.'</i> <strong></strong>
            </td>
            <td>
                <i class="fab fa-angular fa-lg text-danger me-3">'.$experience->user_name.'</i> <strong></strong>
            </td>
            <td>'.$experience->service_name.'VNĐ</td>
            <td>'.$experience->user_image1.'</td>
            <td>'.$experience->user_image2.'</td>
            
            <td>
                <div class="dropdown">
                    <button
                        type="button"
                        class="btn p-0 dropdown-toggle hide-arrow"
                        data-bs-toggle="dropdown"
                    >
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a
                        >
                        <a class="dropdown-item delete-experience" data-experience_id="'.$experience->experience_id.'" href="javascript:void(0);"
                            ><i class="bx bx-trash me-1"></i> Xóa</a
                        >
                    </div>
                </div>
            </td>
        </tr> 
        ';
    }
    echo $output;  
}
public function delete_experience(Request $request){
    $data = $request->all();
    DB::table('tbl_experience')->where('experience_id',$data['experience_id'])->delete();
    
 }
}
