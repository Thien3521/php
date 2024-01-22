<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_booking_user extends Model
{
    protected $fillable = ['booking_user_id	','bk_user_name','bk_user_email','bk_user_phone',
    'bk_user_note'];

    protected $primaryKey = 'booking_user_id';
 	protected $table = 'tbl_booking_user';
}
