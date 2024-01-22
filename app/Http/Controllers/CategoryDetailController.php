<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryDetailController extends Controller
{
    public function category_detail($category_id){
        $detail_category = DB::table('tbl_detail_category')->where('category_id',$category_id)->get();
        return view('home.category.category_detail')->with('detail_category',$detail_category);
    }
}
