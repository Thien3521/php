<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Session;
use App\Models\tbl_room;
use DB;
class RoomController extends Controller
{
    public function all_room(){
        $admin_id = Session::get('admin_id');
        $room= tbl_room::where('admin_id',$admin_id)->get();
      return view('admin.room.all_room')->with('room',$room);
  }
  public function add_room(Request $request){
    $admin_id = Session::get('admin_id');
    $admin_information_id = DB::table('tbl_admin')->Where('admin_id',$admin_id)->value('admin_information_id');
    $data = $request->all();
    $tbl_room = new tbl_room();
    $tbl_room->admin_id = $admin_id;
    $tbl_room->admin_information_id = $admin_information_id;
    $tbl_room->kind_of_room = $data['kind_of_room'];
    $tbl_room->room_number = $data['room_number'];
    $tbl_room->save();

  return Redirect::to('all-room');
}
public function load_room(Request $request){
    $admin_id = Session::get('admin_id');
    $room= tbl_room::where('admin_id',$admin_id)->get();
    $output = '';

    foreach($room as $room) {
        $output .= '<tr>
            <td>
                <i class="fab fa-angular fa-lg text-danger me-3">'.$room->room_number.'</i> <strong></strong>
            </td>
            <td>'.$room->kind_of_room.'</td>
         
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
                        <a class="dropdown-item delete-room" data-room_id="'.$room->room_id.'" href="javascript:void(0);"
                            ><i class="bx bx-trash me-1"></i> Xóa</a
                        >
                    </div>
                </div>
            </td>
        </tr>';
    }

    echo $output;
}
public function delete_room(Request $request){
    $data = $request->all();
    tbl_room::where('room_id',$data['room_id'])->delete();
 }
}
