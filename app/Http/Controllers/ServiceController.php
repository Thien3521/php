<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\tbl_service;
use App\Models\tbl_category;
use App\Models\tbl_admin_information;
use Session;
class ServiceController extends Controller
{
    public function add_service(Request $request){
        $data = $request->all();
        $tbl_service = new tbl_service();
        $tbl_service->category_id = $data['category_id'];
        $tbl_service->admin_information_id = $data['admin_information_id'];
        $tbl_service->service_name = $data['service_name'];
        $tbl_service->service_information = $data['service_information'];
        $tbl_service->service_price = $data['service_price'];
        $tbl_service->service_describe = $data['service_describe'];
        $get_image = $request->file('service_image');    
        
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads',$new_image);
            $tbl_service->service_image = $new_image;
        $tbl_service->save();
        }    
        return Redirect::to('all-service');
    }
    public function all_service(){
    $admin_id = Session::get('admin_id');
    $service = tbl_service::with('adminInformation')
    ->whereHas('adminInformation', function ($query) use ($admin_id) {
        $query->where('admin_id', $admin_id);
    })
    ->get();
    $services = tbl_service::with('adminInformation')
    ->whereHas('adminInformation', function ($query) use ($admin_id) {
        $query->where('admin_id', $admin_id);
    })
    ->take(5)->get();
    $output = '';
    $category= tbl_category::where('admin_id',$admin_id)->get();
    $category2= tbl_category::where('admin_id',$admin_id)->get();
    $tbl_information= tbl_admin_information::with('admin')->where('admin_id',$admin_id)->get();
    $tbl_information2= tbl_admin_information::with('admin')->where('admin_id',$admin_id)->get();
    return view('admin.service.all_service')->with('service',$service)->with('category',$category)->with('category2',$category2)
      ->with('tbl_information',$tbl_information)->with('services',$services)->with('tbl_information2',$tbl_information2);
     }
public function load_service(Request $request)
{
    $admin_id = Session::get('admin_id');
    $service = tbl_service::with('adminInformation')
    ->whereHas('adminInformation', function ($query) use ($admin_id) {
        $query->where('admin_id', $admin_id);
    })
    ->get();
    $services = tbl_service::with('adminInformation')
    ->whereHas('adminInformation', function ($query) use ($admin_id) {
        $query->where('admin_id', $admin_id);
    })
    ->take(5)->get();
    $output = '';

    foreach($services as $services) {
        $output .= '<tr>
            <td>
                <i class="fab fa-angular fa-lg text-danger me-3">'.$services->service_name.'</i> <strong></strong>
            </td>
            <td><textarea name="" id="" cols="50" rows="5">'.$services->service_information.'</textarea></td>
            
            <td>
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        class="avatar avatar-xs pull-up"
                        title="'.$services->service_name.'"
                        style="width: 150px; height: 100px;"
                    >
                        <img src="'.url('public/uploads/'.$services->service_image).'" />
                    </li>
                </ul>
            </td>
            <td>'.$services->service_price.'VNĐ</td>
            <td><textarea name="" id="" cols="50" rows="5">'.$services->service_describe.'</textarea></td>
            
          <div class="modal fade" id="exampleModalLong'.$services->service_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">'.$services->service_image.'</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"></button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
    </div></td>
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
                            ><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit_service'.$services->service_id.'">
                            Chỉnh sửa
                          </button></a
                        >
                        <a class="dropdown-item delete-service" data-service_id="'.$services->service_id.'" href="javascript:void(0);"
                            ><button type="button" class="btn btn-secondary" ><i class="bx bx-trash me-1"></i> 
                            xóa
                          </button></a
                        >
                    </div>
                </div>
            </td>
        </tr> 
        ';
    }
    echo $output;  
}
    public function edit_service(Request $request)
    {
        $data = $request->all();
        $tbl_service = tbl_service::find($request->service_id);
        $tbl_service->category_id = $data['category_id'];
        $tbl_service->admin_information_id = $data['admin_information_id'];
        $tbl_service->service_name = $data['service_name'];
        $tbl_service->service_information = $data['service_information'];
        $tbl_service->service_price = $data['service_price'];
        $tbl_service->service_describe = $data['service_describe'];
        $get_image = $request->file('service_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads', $new_image);
            $tbl_service->service_image = $new_image;
        }

        $tbl_service->update();
        return redirect('all-service');
    }
    public function delete_service(Request $request){
        $data = $request->all();
        tbl_service::where('service_id',$data['service_id'])->delete();
    }
}
