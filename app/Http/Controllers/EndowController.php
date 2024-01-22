<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\tbl_service;
use App\Models\tbl_category;
use App\Models\tbl_endow;
use Session;
use DB;
use App\Models\tbl_admin;
class EndowController extends Controller
{
    public function add_endow(Request $request){
        $admin_id = Session::get('admin_id');
        $admin_information_id = tbl_admin::where('admin_id',$admin_id)->value('admin_information_id');
        $data = $request->all();
        $tbl_endow = new tbl_endow();
        $tbl_endow->admin_information_id = $admin_information_id;
        $tbl_endow->category_id = $data['category_id'];
        $tbl_endow->endow_name = $data['endow_name'];
        $tbl_endow->endow_code = $data['endow_code'];
        $tbl_endow->endow = $data['endow'];
        $tbl_endow->endow_information = $data['endow_information'];
        $tbl_endow->endow_day_begin = $data['endow_day_begin'];
        $tbl_endow->endow_day_end = $data['endow_day_end'];
        $get_image = $request->file('endow_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads', $new_image);
            $tbl_endow->endow_image = $new_image;
            
        }
        $tbl_endow->save();
        
        return Redirect::to('all-endow');
  }
    public function all_endow(){
        $admin_id = Session::get('admin_id');
        $category= tbl_category::where('admin_id',$admin_id)->get();
        
        return view('admin.endow.all_endow')->with('category',$category);
    }

  public function load_endow(Request $request)
{
    $admin_id = Session::get('admin_id');
    $admin_information_id = tbl_admin::where('admin_id',$admin_id)->value('admin_information_id');
    $endow = tbl_endow::where('admin_information_id', $admin_information_id)
    ->orderBy('created_at','desc')
    ->get();
   
    $output = '';
    foreach($endow as $endow) {
        $output .= '<tr>
            <td>
                <i class="fab fa-angular fa-lg text-danger me-3">'.$endow->endow_name.'</i> <strong></strong>
            </td>
            <td><img  style="width: 150px; height: 100px;" src="'.url('public/uploads/'.$endow->endow_image).'" /></td>
            <td>'.$endow->endow_information.'</td>
            <td>'.$endow->endow_code.'</td>
           
            <td>'.$endow->endow_day_begin.'VNĐ</td>
            <td>'.$endow->endow_day_begin.' Phút</td>
           
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
                        <a class="dropdown-item delete-endow" data-endow_id="'.$endow->endow_id.'" href="javascript:void(0);"
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
public function delete_endow(Request $request){
    $data = $request->all();
    tbl_endow::where('endow_id',$data['endow_id'])->delete();
 }
}
