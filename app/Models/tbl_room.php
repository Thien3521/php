<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_room extends Model
{
    protected $fillable = ['room_id','room_number','kind_of_room','admin_information_id'];

    protected $primaryKey = 'room_id';
 	protected $table = 'tbl_room';
}
