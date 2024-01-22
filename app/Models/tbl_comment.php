<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_comment extends Model
{
    public function user()
    {
        return $this->belongsTo(tbl_user::class,  'user_id','user_id');
    }
    protected $fillable = ['comment_id','user_id','admin_information_id','comment','comment_day','comment_time'];

    protected $primaryKey = 'comment_id';
 	protected $table = 'tbl_comment';
}
