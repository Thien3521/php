<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_admin extends Model
{
    protected $fillable = ['admin_id','admin_name','admin_password','admin_email'];

    protected $primaryKey = 'admin_id';
 	protected $table = 'tbl_admin';
}
