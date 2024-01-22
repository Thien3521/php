<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\tbl_category;
use App\Models\tbl_service;
use App\Models\tbl_admin_address;
use App\Models\City;
use App\Models\tbl_booking;
use App\Models\tbl_admin_information;

class IntroduceController extends Controller
{
    public function introduce(){
        $data = City::all();
        $category = tbl_category::all(); 
        $service = tbl_service::all();     
        $basis  = tbl_admin_information::all();   
        return view('home.introduce')->with('category',$category)->with('service',$service)
        ->with('basis',$basis)->with('data',$data);
       }
}
