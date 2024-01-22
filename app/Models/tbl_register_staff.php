<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_register_staff extends Model
{
   

    protected $fillable = ['regiter_staff_id','admin_id','admin_information_id','register_status'];

    protected $primaryKey = 'regiter_staff_id';
 	protected $table = 'tbl_register_staff';
}
