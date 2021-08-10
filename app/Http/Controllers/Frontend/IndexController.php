<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        $banners=Banner::where(['status'=>'active','condition'=>'banner'])->orderBy('id','DESC')->limit('5')->get();
        $categories=Category::where(['status'=>'active','is_parent'=>1])->limit('12')->orderBy('id','ASC')->get();
        $brands=Brand::where(['status'=>'active'])->orderBy('id','ASC')->limit('6')->get();
        return view('frontend.index',compact(['banners','categories','brands']));
    }
}
