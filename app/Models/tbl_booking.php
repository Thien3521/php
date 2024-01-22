<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_booking extends Model
{
    public function booking_service()
    {
        return $this->hasOne(tbl_booking_service::class, 'booking_service_id', 'booking_service_id');
    }
    public function booking_user()
    {
        return $this->hasOne(tbl_booking_user::class, 'booking_user_id', 'booking_user_id');
        
    }
    public function service()
    {
        return $this->belongsTo(tbl_service::class, 'service_id', 'service_id');
    }
    public function adminstaff()
    {
        return $this->belongsTo(tbl_staff::class, 'staff_id', 'staff_id');
    }
    public function rooms()
    {
        return $this->hasOne(tbl_room::class, 'room_id', 'room_id');
    }

    
    protected $fillable = ['booking_id','booking_service_id','booking_quantity','booking_day','booking_shiff'
                            ,'booking_user_id','booking_price','booking_pay	','booking_code','user_id','service_id','staff_id','room_id'];

    protected $primaryKey = 'booking_id';
 	protected $table = 'tbl_booking';
}
