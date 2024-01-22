<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_statistical extends Model
{
    protected $fillable = ['statistical_id ','admin_information_id','admin_id',
    'order_date	','revenue','quantity','total_order'];

    protected $primaryKey = 'statistical_id ';
 	protected $table = 'tbl_statistical';
}
