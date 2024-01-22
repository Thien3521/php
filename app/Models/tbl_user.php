<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_user extends Model
{
    protected $fillable = ['user_id ','user_name','user_email',
    'user_password','user_image'];

    protected $primaryKey = 'user_id ';
 	protected $table = 'tbl_user';
}
