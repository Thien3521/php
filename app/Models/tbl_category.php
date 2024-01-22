<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_category extends Model
{
    public function service()
    {
        return $this->hasMany(tbl_service::class);
    }
    protected $fillable = ['category_id','category_name','category_image','category_information','admin_id','admin_information_id'];

    protected $primaryKey = 'category_id';
 	protected $table = 'tbl_category';
}
