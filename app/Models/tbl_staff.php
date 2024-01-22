<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_staff extends Model
{
    public function admins()
    {
        return $this->belongsTo(tbl_admin::class, 'admin_id', 'admin_id');
    }

    protected $fillable = ['staff_id','admin_id','staff_name',
    'staff_image','staff_sex','staff_birthday','staff_position','admin_information_id'];

    protected $primaryKey = 'staff_id';
 	protected $table = 'tbl_staff';
}
