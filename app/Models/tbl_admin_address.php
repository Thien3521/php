<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_admin_address extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class,  'mtp','address_city');
    }
    public function province()
    {
        return $this->belongsTo(Province::class,  'mqh','address_province');
    }
    public function wards()
    {
        return $this->belongsTo(Wards::class,  'xaid','address_wards');
    }
    protected $fillable = ['admin_address_id','address_city','address_province','address_wards','number_address','email'];

    protected $primaryKey = 'admin_address_id';
 	protected $table = 'tbl_admin_address';
}
