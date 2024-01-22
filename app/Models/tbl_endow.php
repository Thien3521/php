<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_endow extends Model
{
    protected $fillable = ['endow_id','category_id','admin_information_id','endow_name','endow_image','endow_information',
    'endow_day_begin','endow_day_end','endow_code','endow'];

    protected $primaryKey = 'endow_id';
 	protected $table = 'tbl_endow';
}
