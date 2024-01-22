<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_booking_service extends Model
{
    protected $fillable = ['booking_service_id	','bk_name','bk_image','bk_address',
    'bk_price','bk_information'];

    protected $primaryKey = 'booking_service_id';
 	protected $table = 'tbl_booking_service';
}
