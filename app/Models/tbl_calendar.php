<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_calendar extends Model
{
    public function staff()
    {
        return $this->belongsTo(tbl_staff::class,  'staff_id','staff_id');
    }
    protected $fillable = ['calendar_id','staff_id','admin_information_id','calendar_day','calendar_shift'];

    protected $primaryKey = 'calendar_id';
 	protected $table = 'tbl_calendar';
}
