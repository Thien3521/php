<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\tbl_comment;
use Session;
class CommentController extends Controller
{
    public function add_comment(Request $request){
        $data = $request->all();
        $user_id = Session::get('user_id');
        $tbl_comment = new tbl_comment();
        $tbl_comment->admin_information_id = $data['admin_information_id'];
        $tbl_comment->comment = $data['comment'];
        $tbl_comment->user_id = $user_id;
        // Lấy ngày và giờ hiện tại
            
        $now = Carbon::now('Asia/Ho_Chi_Minh'); // Lấy ngày và giờ hiện tại sử dụng Carbon
        $tbl_comment->comment_day = $now->toDateString(); // Lấy ngày hiện tại và gán vào thuộc tính comment_day
        $tbl_comment->comment_time = $now->toTimeString(); // Lấy giờ hiện tại và gán vào thuộc tính comment_time
        $tbl_comment->save();

       
    }
    public function load_comment(Request $request){
        $data = $request->all();
        
        $comment = tbl_comment::with('user')->where('admin_information_id',$data['admin_information_id'])
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

        $output = '';
        foreach ($comment as $comment) {
            $output .= ' <div class="d-flex flex-start">
                <img class="rounded-circle shadow-1-strong me-3"
                    src="https://hocdohoacaptoc.com/storage/2022/02/avata-dep-nam-2.jpg" alt="avatar" width="65"
                    height="65" />
        
                <div class="flex-grow-1 flex-shrink-1">
                    <div>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-1">
                            ' . $comment->user->user_name . '
                            </p><span class="small">' . $comment->comment_day . ' ' . $comment->comment_time . '</span>
                            <a href="#!" onclick="toggleReply(' . $comment->comment_id . ')"><i class="fas fa-reply fa-xs"></i><span class="small"> Phản hồi</span></a>
                        </div>
                        <p class="small mb-0">
                            ' . $comment->comment . '
                        </p>
                    </div>
        
                  
        
        
                </div>
            </div>';
        }
       
            echo $output;
    }
}
