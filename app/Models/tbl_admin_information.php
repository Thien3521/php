<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_admin_information extends Model
{
    public function adminAddress()
    {
        return $this->belongsTo(tbl_admin_address::class,  'admin_address','admin_address_id');
    }
    public function admin()
    {
        return $this->belongsTo(tbl_admin::class,  'admin_id','admin_id');
    }
    public function register_staff()
    {
        return $this->belongsTo(tbl_register_staff::class,  'admin_information_id','admin_information_id');
    }
    protected $fillable = ['admin_id','admin_information_id','admin_image','admin_information_name',
    'admin_address','admin_phone','admin_introduce','open_time','close_time'];

    protected $primaryKey = 'admin_information_id';
 	protected $table = 'tbl_admin_information';
}
