<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_service extends Model
{
    public function category()
    {
        return $this->belongsTo(tbl_category::class);
    }
    public function adminInformation()
    {
        return $this->belongsTo(tbl_admin_information::class, 'admin_information_id', 'admin_information_id');
    }
    
    protected $fillable = ['service_id','category_id','admin_information_id','service_name',
    'service_image','service_information','service_price','service_describe','service_id'];

    protected $primaryKey = 'service_id';
 	protected $table = 'tbl_service';
}
