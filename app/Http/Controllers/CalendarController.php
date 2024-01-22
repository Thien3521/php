<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\tbl_calendar;
use App\Models\tbl_staff;
use App\Models\tbl_booking;
class CalendarController extends Controller
{
    public function all_calendar(){
        $staff = tbl_staff::all();
        return view('admin.calendar.all_calendar')->with('staff',$staff);
    }
    public function add_calendar(Request $request){
        $admin_id = Session::get('admin_id');
        $admin_information_id = DB::table('tbl_admin')->where('admin_id',$admin_id)->value('admin_information_id');
        $data = $request->all();
        $calender_day = Carbon::createFromFormat('d/m/Y', $data['calendar_day'])->format('Y-m-d');
        $tbl_calendar = new tbl_calendar();
        $tbl_calendar->staff_id = $data['staff_id'];
        $tbl_calendar->admin_information_id = $admin_information_id;
        $tbl_calendar->calendar_day = $calender_day;
        $tbl_calendar->calendar_shift = $data['calendar_shift'];
        $tbl_calendar->save();
        return Redirect::to('all-calendar');
  }
  public function delete_calendar(Request $request){
     $data = $request->all();
     tbl_calendar::where('calendar_id',$data['calendar_id'])->delete();
  }
  
  public function load_calendar(Request $request)
  {
      $data = $request->all();
      $admin_id = Session::get('admin_id');
      $admin_information_id = DB::table('tbl_admin_information')->where('admin_id', $admin_id)->value('admin_information_id');
      $calendar = tbl_Calendar::with('staff')->where('admin_information_id',$admin_information_id)->get();
    $booking = tbl_booking::with('booking_user')
          ->with('booking_service')
          ->with('service.adminInformation')
          ->with('service.adminInformation.adminAddress')->where('admin_id', $admin_id)->where('booking_status', '>=', 1)->get();
          
  
      $output = '<table>';
  
      $currentTimestamp = Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek(); // Lấy ngày bắt đầu của tuần
      $startTimestamp = $currentTimestamp->timestamp;
      
      $output .= '<tr>';
      $output .= '<th>Day</th>';
      for ($i = 0; $i < 7; $i++) {
        $currentDate = $currentTimestamp->format('d/m/Y');
        $output .= '<th>' . $currentTimestamp->format('l') . '</br>' . $currentTimestamp->format('d/m/Y') . '</br><button type="button" class="btn btn-primary" 
        data-toggle="modal" data-target="#'.$currentDate.'">
       Nhân viên
       </button> </th>';
        $currentTimestamp->addDay(); // Tăng ngày lên 1

        $staffs  = tbl_staff::where('admin_information_id',$admin_information_id)->get();
        
        
        $output.='<div class="modal fade" id="'.$currentDate.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Thêm Lịch làm</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form method = "POST" action="'.url('/add-calendar').'" enctype="multipart/form-data">
        '.csrf_field().'
            <div class="mb-3">
            <div class="mb-3">
            <label for="formFile" class="form-label">Ngày làm việc</label>
            '.$currentDate.'
          </div>
              <label for="exampleFormControlSelect1" class="form-label">Chọn nhân viên</label>
              <select class="form-select staff_id" name="staff_id" id="staff_id" aria-label="Default select example">';
              foreach($staffs as $staff){
                $output .='  <option name="staff_id" value="'.$staff->staff_id.'">'.$staff->staff_name.'</option>';
              }
              $output .='
              </select>
              
            </div>
           
            <label for="exampleFormControlSelect1" class="form-label">Chọn ca</label>
              <select class="form-select calendar_shift" name="calendar_shift" id="calendar_shift" aria-label="Default select example">
              
               <option name="calendar_shift" value="1">Ca 1</option>
               <option name="calendar_shift" value="2">Ca 2</option>
               <option name="calendar_shift" value="3">Ca 3</option>
              </select>
              
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
            <button type="button" class="btn btn-primary add-calendar" data-calendar_day="'.$currentDate.'"  name = "add-calendar">Thêm nhân viên</button>
            </div>
          </form>
        </div>
        </div>
       </div>
    </div>';
   
    }
    
      $output .= '</tr>';
  
      // Add a row for each shift (morning, afternoon, evening)
      $shifts = ['Sáng', 'Trưa', 'Tối'];
        
      for ($shiftIndex = 0; $shiftIndex < 3; $shiftIndex++) {
        $output .= '<tr>';
        $currentTimestamp = Carbon::now('Asia/Ho_Chi_Minh')->startOfWeek(); // Đặt lại ngày bắt đầu của tuần
        $output .= '<td>' . $shifts[$shiftIndex] . '</td>';
        for ($dayIndex = 0; $dayIndex < 7; $dayIndex++) {
            $isScheduled = false;
            $output .= '<td>';
            
            foreach ($booking as $bookedItem) {
                $booking_shift = substr($bookedItem->booking_shift, 0, 5);
                if (Carbon::parse($bookedItem->booking_day)->isSameDay($currentTimestamp)) {
                    $check_shift = Carbon::parse($booking_shift); // Chuyển đổi thời gian đặt lịch sang đối tượng Carbon
                    
                    if ($check_shift->greaterThan(Carbon::parse('07:00')) && $check_shift->lessThan(Carbon::parse('12:00')) && $shiftIndex == 0) {
                        $output .= '<p>Tên : '.$bookedItem->booking_user->bk_user_name.' </p>
                                    <p>Dịch vụ : '.$bookedItem->booking_service->bk_name.' </p>
                                    <p>Giờ đặt : '.$bookedItem->booking_shift.' </p>';
                        $isScheduled = true;
                    } elseif ($check_shift->greaterThan(Carbon::parse('12:00')) && $check_shift->lessThan(Carbon::parse('18:00')) && $shiftIndex == 1) {
                        $output .= '<p>Tên : '.$bookedItem->booking_user->bk_user_name.' </p>
                                    <p>Dịch vụ : '.$bookedItem->booking_service->bk_name.' </p>
                                    <p>Giờ đặt : '.$bookedItem->booking_shift.' </p>';
                                    
                        $isScheduled = true;
                    } elseif ($check_shift->greaterThan(Carbon::parse('18:00')) && $check_shift->lessThan(Carbon::parse('23:59')) && $shiftIndex == 2) {
                        $output .= '<p>Tên : '.$bookedItem->booking_user->bk_user_name.' </p>
                                    <p>Dịch vụ : '.$bookedItem->booking_service->bk_name.' </p>
                                    <p>Giờ đặt : '.$bookedItem->booking_shift.' </p>';
                                    
                        $isScheduled = true;
                    }
                }
            }
            if (!$isScheduled) {
                
                $output .= '<p>Chưa</p>';
               
            }
            $isScheduleds = false;
            foreach ($calendar as $calendarItem) {
                
                if (Carbon::parse($calendarItem->calendar_day)->isSameDay($currentTimestamp)) {
                    if ($calendarItem->calendar_shift == 1 && $shiftIndex == 0) {
                        $output .= '<p>Nhân viên: '.$calendarItem->staff->staff_name.' </p>';
                        $isScheduleds = true;
                    } elseif ($calendarItem->calendar_shift == 2 && $shiftIndex == 1) {
                        $output .= '<p>Nhân viên: '.$calendarItem->staff->staff_name.' </p>';
                                    
                        $isScheduleds = true;
                    } elseif ($calendarItem->calendar_shift == 3 && $shiftIndex == 2) {
                        $output .= '<p>Nhân viên: '.$calendarItem->staff->staff_name.' </p>';
                                    
                        $isScheduleds = true;
                    }  
                }     
            }
            if (!$isScheduleds) {
                 
              
                
            }
            $output .= '</td>';
            $currentTimestamp->addDay(); // Tăng ngày lên 1
            $staffs = tbl_staff::where('admin_id',$admin_id)->get();
        
        $output.='
        <div class="modal fade" id="'.$currentDate.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Thêm Lịch làm</h5>
          
        </div>
        <div class="modal-body">
        <form method = "POST" action="'.url('/add-calendar').'" enctype="multipart/form-data">
        '.csrf_field().'
            <div class="mb-3">
            <div class="mb-3">
            <label for="formFile" class="form-label">Ngày làm việc</label>
            '.$currentDate.'
          </div>
              <label for="exampleFormControlSelect1" class="form-label">Chọn nhân viên</label>
              <select class="form-select staff_id" name="staff_id" id="staff_id" aria-label="Default select example">';
              foreach($staffs as $staff){
                $output .='  <option name="staff_id" value="'.$staff->staff_id.'">'.$staff->staff_name.'</option>';
              }
              $output .='
              </select>
              
            </div>
           
            <label for="exampleFormControlSelect1" class="form-label">Chọn ca</label>
              <select class="form-select calendar_shift" name="calendar_shift" id="calendar_shift" aria-label="Default select example">
              
               <option name="calendar_shift" value="1">Ca 1</option>
               <option name="calendar_shift" value="2">Ca 2</option>
               <option name="calendar_shift" value="3">Ca 3</option>
              </select>
              
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn_close" data-dismiss="modal">Thoát</button>
            <button type="button" class="btn btn-primary add-calendar" data-calendar_day="'.$currentDate.'"  name = "add-calendar">Thêm nhân viên</button>
            </div>
          </form>
        </div>
        </div>
       </div>
    </div>';
        }
        $output .= '</tr>';
    }
    
  
      // Thêm nút tuần trước và tuần tiếp theo ở đây
      $lastWeekTimestamp = Carbon::now('Asia/Ho_Chi_Minh')->subWeek()->startOfWeek()->timestamp;
      
      $nextWeekTimestamp = Carbon::now('Asia/Ho_Chi_Minh')->addWeek()->startOfWeek()->timestamp;
      
      $output .= '</table> 
      <div class="row">
      <div  class="col align-self-center">
      <button  id="last-week" data-calendar_date="' . $lastWeekTimestamp . '"><-</button>
      <button id="next-week" data-calendar_date="' . $nextWeekTimestamp . '">-></button>
      </div>
      </div>  ';
      
      return $output;
  }
  

    public function load_nextweek_booking(Request $request){
        $data = $request->all();
        $admin_id = Session::get('admin_id');
        $admin_information_id = DB::table('tbl_admin_information')->where('admin_id', $admin_id)->value('admin_information_id');
      $calendar = tbl_Calendar::with('staff')->where('admin_information_id',$admin_information_id)->get();
      $booking = tbl_booking::with('booking_user')
      ->with('booking_service')
      ->with('service.adminInformation')
      ->with('service.adminInformation.adminAddress')->where('admin_id', $admin_id)->where('booking_status', '>=', 1)->get();
  
      $output = '<table>';
      
      $startOfWeekTimestamp = $data['nextweek'];
      $currentTimestamp = Carbon::createFromTimestamp($startOfWeekTimestamp, 'Asia/Ho_Chi_Minh')->startOfWeek();
  
      $output .= '<tr>';
      $output .= '<th>Day</th>';
      $currentDate = $currentTimestamp->format('d/m/Y');
      for ($i = 0; $i < 7; $i++) {
          $output .= '<th>' . $currentTimestamp->format('l') . '</br>' . $currentTimestamp->format('d/m/Y') . '</br><button type="button" class="btn btn-primary" 
          data-toggle="modal" data-target="#'.$currentDate.'">
         Nhân viên
         </button> </th>';
          $currentTimestamp->addDay(); // Tăng ngày lên 1
          
      }
      $output .= '</tr>';
  
      // Add a row for each shift (morning, afternoon, evening)
      $shifts = ['Sáng', 'Trưa', 'Tối'];
      for ($shiftIndex = 0; $shiftIndex < 3; $shiftIndex++) {
        $output .= '<tr>';
        $currentTimestamp = Carbon::createFromTimestamp($startOfWeekTimestamp, 'Asia/Ho_Chi_Minh')->startOfWeek();
        $output .= '<td>' . $shifts[$shiftIndex] . '</td>';
        for ($dayIndex = 0; $dayIndex < 7; $dayIndex++) {
            $isScheduled = false;
            $output .= '<td>';
            foreach ($booking as $bookedItem) {
                $booking_shift = substr($bookedItem->booking_shift, 0, 5);
                if (Carbon::parse($bookedItem->booking_day)->isSameDay($currentTimestamp)) {
                    $check_shift = Carbon::parse($booking_shift); // Chuyển đổi thời gian đặt lịch sang đối tượng Carbon
                   
                    if ($check_shift->greaterThan(Carbon::parse('07:00')) && $check_shift->lessThan(Carbon::parse('12:00')) && $shiftIndex == 0) {
                        $output .= '<p>Tên : '.$bookedItem->booking_user->bk_user_name.' </p>
                                    <p>Dịch vụ : '.$bookedItem->booking_service->bk_name.' </p>
                                    <p>Giờ đặt : '.$bookedItem->booking_shift.' </p>';
                        $isScheduled = true;
                    } elseif ($check_shift->greaterThan(Carbon::parse('12:00')) && $check_shift->lessThan(Carbon::parse('18:00')) && $shiftIndex == 1) {
                        $output .= '<p>Tên : '.$bookedItem->booking_user->bk_user_name.' </p>
                                    <p>Dịch vụ : '.$bookedItem->booking_service->bk_name.' </p>
                                    <p>Giờ đặt : '.$bookedItem->booking_shift.' </p>';
                                    
                        $isScheduled = true;
                    } elseif ($check_shift->greaterThan(Carbon::parse('18:00')) && $check_shift->lessThan(Carbon::parse('23:59')) && $shiftIndex == 2) {
                        $output .= '<p>Tên : '.$bookedItem->booking_user->bk_user_name.' </p>
                                    <p>Dịch vụ : '.$bookedItem->booking_service->bk_name.' </p>
                                    <p>Giờ đặt : '.$bookedItem->booking_shift.' </p>';
                                    
                        $isScheduled = true;
                    }
                    
                    
                    
                }
                
            }
            if (!$isScheduled) {
                $output .= '<p>Chưa</p>';
            }
            $isScheduleds = false;
            foreach ($calendar as $calendarItem) {
                if (Carbon::parse($calendarItem->calendar_day)->isSameDay($currentTimestamp)) {
                
                   
                    if ($calendarItem->calendar_shift == 1 && $shiftIndex == 0) {
                        $output .= '<p>Nhân viên: '.$calendarItem->staff->staff_name.' </p>';
                        $isScheduleds = true;
                    } elseif ($calendarItem->calendar_shift == 2 && $shiftIndex == 1) {
                        $output .= '<p>Nhân viên: '.$calendarItem->staff->staff_name.' </p>';
                                    
                        $isScheduleds = true;
                    } elseif ($calendarItem->calendar_shift == 3 && $shiftIndex == 2) {
                        $output .= '<p>Nhân viên: '.$calendarItem->staff->staff_name.' </p>';
                                    
                        $isScheduleds = true;
                    }
                    
                    
                    
                }
                
            }
            if (!$isScheduleds) {
               
            }
            $output .= '</td>';
            $currentTimestamp->addDay(); // Tăng ngày lên 1
            $staffs = DB::table('tbl_staff')->where('admin_information_id',$admin_information_id)->get();
        
            $output.='<div class="modal fade" id="'.$currentDate.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Thêm Lịch làm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method = "POST" action="'.url('/add-calendar').'" enctype="multipart/form-data">
            '.csrf_field().'
                <div class="mb-3">
                <div class="mb-3">
                <label for="formFile" class="form-label">Ngày làm việc</label>
                '.$currentDate.'
              </div>
                  <label for="exampleFormControlSelect1" class="form-label">Chọn nhân viên</label>
                  <select class="form-select staff_id" name="staff_id" id="staff_id" aria-label="Default select example">';
                  foreach($staffs as $staff){
                    $output .='  <option name="staff_id" value="'.$staff->staff_id.'">'.$staff->staff_name.'</option>';
                  }
                  $output .='
                  </select>
                  
                </div>
               
                <label for="exampleFormControlSelect1" class="form-label">Chọn ca</label>
                  <select class="form-select calendar_shift" name="calendar_shift" id="calendar_shift" aria-label="Default select example">
                  
                   <option name="calendar_shift" value="1">Ca 1</option>
                   <option name="calendar_shift" value="2">Ca 2</option>
                   <option name="calendar_shift" value="3">Ca 3</option>
                  </select>
                  
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-primary add-calendar" data-calendar_day="'.$currentDate.'"  name = "add-calendar">Thêm nhân viên</button>
                </div>
              </form>
            </div>
            </div>
           </div>
        </div>';
        }
        $output .= '</tr>';
    }
  
      // Thêm nút tuần trước và tuần tiếp theo ở đây
      $lastWeekTimestamp = Carbon::createFromTimestamp($startOfWeekTimestamp, 'Asia/Ho_Chi_Minh')->subWeek()->startOfWeek()->timestamp;    
      $nextWeekTimestamp = Carbon::createFromTimestamp($startOfWeekTimestamp, 'Asia/Ho_Chi_Minh')->addWeek()->startOfWeek()->timestamp;
      
      $output .= '</table> 
      <div class="row">
      <div  class="col align-self-center">
      <button  id="last-week" data-calendar_date="' . $lastWeekTimestamp . '"><-</button>
      <button id="next-week" data-calendar_date="' . $nextWeekTimestamp . '">-></button>
      </div>
      </div>';
      
      return $output;
    }
    public function load_lastweek_booking(Request $request){
        $data = $request->all();
        $admin_id = Session::get('admin_id');
        $admin_information_id = DB::table('tbl_admin_information')->where('admin_id', $admin_id)->value('admin_information_id');
      $calendar = tbl_Calendar::with('staff')->where('admin_information_id',$admin_information_id)->get();

      $booking = tbl_booking::with('booking_user')
      ->with('booking_service')
      ->with('service.adminInformation')
      ->with('service.adminInformation.adminAddress')->where('admin_id', $admin_id)->where('booking_status', '>=', 1)->get();

      $output = '<table>';
  
      $startOfWeekTimestamp = $data['lastweek'];
      $currentTimestamp = Carbon::createFromTimestamp($startOfWeekTimestamp, 'Asia/Ho_Chi_Minh')->startOfWeek();
  
      $output .= '<tr>';
      $output .= '<th>Day</th>';
      $currentDate = $currentTimestamp->format('d/m/Y');
      for ($i = 0; $i < 7; $i++) {
          $output .= '<th>' . $currentTimestamp->format('l') . '</br>' . $currentTimestamp->format('d/m/Y') . '</br><button type="button" class="btn btn-primary" 
          data-toggle="modal" data-target="#'.$currentDate.'">
         Nhân viên
         </button> </th>';
          $currentTimestamp->addDay(); // Tăng ngày lên 1
          $staffs = tbl_staff::where('admin_id',$admin_id)->get();
        
          $output.='<div class="modal fade" id="'.$currentDate.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Thêm Lịch làm</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form method = "POST" action="'.url('/add-calendar').'" enctype="multipart/form-data">
          '.csrf_field().'
              <div class="mb-3">
              <div class="mb-3">
              <label for="formFile" class="form-label">Ngày làm việc</label>
              '.$currentDate.'
            </div>
                <label for="exampleFormControlSelect1" class="form-label">Chọn nhân viên</label>
                <select class="form-select staff_id" name="staff_id" id="staff_id" aria-label="Default select example">';
                foreach($staffs as $staff){
                  $output .='  <option name="staff_id" value="'.$staff->staff_id.'">'.$staff->staff_name.'</option>';
                }
                $output .='
                </select>
                
              </div>
             
              <label for="exampleFormControlSelect1" class="form-label">Chọn ca</label>
                <select class="form-select calendar_shift" name="calendar_shift" id="calendar_shift" aria-label="Default select example">
                
                 <option name="calendar_shift" value="1">Ca 1</option>
                 <option name="calendar_shift" value="2">Ca 2</option>
                 <option name="calendar_shift" value="3">Ca 3</option>
                </select>
                
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
              <button type="button" class="btn btn-primary add-calendar" data-calendar_day="'.$currentDate.'"  name = "add-calendar">Thêm nhân viên</button>
              </div>
            </form>
          </div>
          </div>
         </div>
      </div>';
      }
      $output .= '</tr>';
  
      // Add a row for each shift (morning, afternoon, evening)
      $shifts = ['Sáng', 'Trưa', 'Tối'];
      for ($shiftIndex = 0; $shiftIndex < 3; $shiftIndex++) {
        $output .= '<tr>';
        $currentTimestamp = Carbon::createFromTimestamp($startOfWeekTimestamp, 'Asia/Ho_Chi_Minh')->startOfWeek(); // Đặt lại ngày bắt đầu của tuần
        $output .= '<td>' . $shifts[$shiftIndex] . '</td>';
        for ($dayIndex = 0; $dayIndex < 7; $dayIndex++) {
            $isScheduled = false;
            $output .= '<td>';
            foreach ($booking as $bookedItem) {
                $booking_shift = substr($bookedItem->booking_shift, 0, 5);
                if (Carbon::parse($bookedItem->booking_day)->isSameDay($currentTimestamp)) {
                    $check_shift = Carbon::parse($booking_shiff); // Chuyển đổi thời gian đặt lịch sang đối tượng Carbon
                   
                    if ($check_shift->greaterThan(Carbon::parse('07:00')) && $check_shift->lessThan(Carbon::parse('12:00')) && $shiftIndex == 0) {
                        $output .= '<p>Tên : '.$bookedItem->booking_user->bk_user_name.' </p>
                                    <p>Dịch vụ : '.$bookedItem->booking_service->bk_name.' </p>
                                    <p>Giờ đặt : '.$bookedItem->booking_shift.' </p>';
                        $isScheduled = true;
                    } elseif ($check_shift->greaterThan(Carbon::parse('12:00')) && $check_shift->lessThan(Carbon::parse('18:00')) && $shiftIndex == 1) {
                        $output .= '<p>Tên : '.$bookedItem->booking_user->bk_user_name.' </p>
                                    <p>Dịch vụ : '.$bookedItem->booking_service->bk_name.' </p>
                                    <p>Giờ đặt : '.$bookedItem->booking_shift.' </p>';
                                    
                        $isScheduled = true;
                    } elseif ($check_shift->greaterThan(Carbon::parse('18:00')) && $check_shift->lessThan(Carbon::parse('23:59')) && $shiftIndex == 2) {
                        $output .= '<p>Tên : '.$bookedItem->booking_user->bk_user_name.' </p>
                                    <p>Dịch vụ : '.$bookedItem->booking_service->bk_name.' </p>
                                    <p>Giờ đặt : '.$bookedItem->booking_shift.' </p>';
                                    
                        $isScheduled = true;
                    }
                    
                    
                    
                }
                
            }
            if (!$isScheduled) {
                $output .= '<p>Chưa</p>';
            }
            $isScheduleds = false;
            foreach ($calendar as $calendarItem) {
                if (Carbon::parse($calendarItem->calendar_day)->isSameDay($currentTimestamp)) {
                
                   
                    if ($calendarItem->calendar_shift == 1 && $shiftIndex == 0) {
                        $output .= '<p>Nhân viên: '.$calendarItem->staff->staff_name.' </p>';
                        $isScheduleds = true;
                    } elseif ($calendarItem->calendar_shift == 2 && $shiftIndex == 1) {
                        $output .= '<p>Nhân viên: '.$calendarItem->staff->staff_name.' </p>';
                                    
                        $isScheduleds = true;
                    } elseif ($calendarItem->calendar_shift == 3 && $shiftIndex == 2) {
                        $output .= '<p>Nhân viên: '.$calendarItem->staff->staff_name.' </p>';
                                    
                        $isScheduleds = true;
                    }
                    
                    
                    
                }
                
            }
            if (!$isScheduleds) {

            }
            $output .= '</td>';
            $currentTimestamp->addDay(); // Tăng ngày lên 1
        }
        $output .= '</tr>';
    }
  
      // Thêm nút tuần trước và tuần tiếp theo ở đây
      $lastWeekTimestamp = Carbon::createFromTimestamp($startOfWeekTimestamp, 'Asia/Ho_Chi_Minh')->subWeek()->startOfWeek()->timestamp;    
      $nextWeekTimestamp = Carbon::createFromTimestamp($startOfWeekTimestamp, 'Asia/Ho_Chi_Minh')->addWeek()->startOfWeek()->timestamp;
      
      $output .= '</table> 
      <div class="row">
      <div  class="col align-self-center">
      <button  id="last-week" data-calendar_date="' . $lastWeekTimestamp . '"><-</button>
      <button id="next-week" data-calendar_date="' . $nextWeekTimestamp . '">-></button>
      </div>
      </div>';
      
      return $output;
    }
    public function calendar_booking(){
        return view('admin.calendar.calendar_booking');
    }

}
