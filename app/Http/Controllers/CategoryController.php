<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\tbl_category;

class CategoryController extends Controller
{
public function all_category(){
      $category= tbl_category::all();
    return view('admin.category.all_category')->with('category',$category);
}
public function add_category(Request $request){
      $data = $request->all();
      $admin_id = Session::get('admin_id');
      $admin_information_id = DB::table('tbl_admin')->where('admin_id',$admin_id)->value('admin_information_id');
      $tbl_category = new tbl_category();
      $tbl_category->admin_id = $admin_id;
      $tbl_category->admin_information_id = $admin_information_id;
      $tbl_category->category_name = $data['category_name'];
      $tbl_category->category_information = $data['category_information'];
      $get_image = $request->file('category_image');    
      
      if($get_image){
          $get_name_image = $get_image->getClientOriginalName();
          $name_image = current(explode('.',$get_name_image));
          $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
          $get_image->move('public/uploads',$new_image);
          $tbl_category->category_image = $new_image;
      $tbl_category->save();
      }    
      return Redirect::to('all-category');
}
public function delete_category(Request $request){
   $data = $request->all();
   tbl_category::where('category_id',$data['category_id'])->delete();
}

public function load_category(Request $request){
    $admin_id = Session::get('admin_id');
    $categories = tbl_category::where('admin_id',$admin_id)->get();
    $output = '';

    foreach($categories as $category) {
        $output .= '<tr>
            <td>
                <i class="fab fa-angular fa-lg text-danger me-3">'.$category->category_name.'</i> <strong></strong>
            </td>
            <td ><textarea name="" id="" cols="50" rows="5">'.$category->category_information.'</textarea></td>
            
            <td>
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        class="avatar avatar-xs pull-up"
                        title="'.$category->category_name.'"
                        style="width: 150px; height: 100px;"
                    >
                        <img src="'.url('public/uploads/'.$category->category_image).'" />
                    </li>
                </ul>
            </td>
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
                        <a class="dropdown-item detail-category" data-category_id="'.$category->category_id.'" href="'.url('detail-category/'.$category->category_id).'"
                            ><i class="bx bx-detail me-1"></i> Chi tiết</a
                        >
                        <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-1"></i> Chỉnh sửa</a
                        >
                        <a class="dropdown-item delete-category" data-category_id="'.$category->category_id.'" href="javascript:void(0);"
                            ><i class="bx bx-trash me-1"></i> Xóa</a
                        >
                    </div>
                </div>
            </td>
        </tr>';
    }

    echo $output;
}
    public function detail_category($category_id){
       $detail_category = DB::table('tbl_detail_category')->where('category_id',$category_id)->get();
        return view('admin.category.detail_category', ['category_id' => $category_id])
        ->with('detail_category',$detail_category);
    }
    public function add_detail_category(Request $request, $category_id){
        $data = array();
        $data['category_id'] = $category_id;
        $data['information1'] = $request->information1;
        $data['information2'] = $request->information2;
        $data['information3'] = $request->information3;
        $data['information4'] = $request->information4;
        // Xử lý ảnh 1
        $image1 = $request->file('image1');    
        if($image1){
            $image1Name = $image1->getClientOriginalName();
            $imageName1 = current(explode('.', $image1Name));
            $newImage1 = $imageName1 . rand(0, 99) . '.' . $image1->getClientOriginalExtension();
            $image1->move('public/uploads', $newImage1);
            $data['image1'] = $newImage1;
        }
    
        // Xử lý ảnh 2
        $image2 = $request->file('image2');    
        if($image2){
            $image2Name = $image2->getClientOriginalName();
            $imageName2 = current(explode('.', $image2Name));
            $newImage2 = $imageName2 . rand(0, 99) . '.' . $image2->getClientOriginalExtension();
            $image2->move('public/uploads', $newImage2);
            $data['image2'] = $newImage2;
        }
    
        // Xử lý ảnh 3
        $image3 = $request->file('image3');    
        if($image3){
            $image3Name = $image3->getClientOriginalName();
            $imageName3 = current(explode('.', $image3Name));
            $newImage3 = $imageName3 . rand(0, 99) . '.' . $image3->getClientOriginalExtension();
            $image3->move('public/uploads', $newImage3);
            $data['image3'] = $newImage3;
        }
    
        // Xử lý ảnh 4
        $image4 = $request->file('image4');    
        if($image4){
            $image4Name = $image4->getClientOriginalName();
            $imageName4 = current(explode('.', $image4Name));
            $newImage4 = $imageName4 . rand(0, 99) . '.' . $image4->getClientOriginalExtension();
            $image4->move('public/uploads', $newImage4);
            $data['image4'] = $newImage4;
        }
    
        DB::table('tbl_detail_category')->insert($data);
    
        return view('admin.category.all_category');
    }
    public function delete_detail_category($detail_category_id){
        $detail_category = DB::table('tbl_detail_category')->where('detail_category_id',$detail_category_id)->delete();
        return view('admin.category.all_category');
     }
}
