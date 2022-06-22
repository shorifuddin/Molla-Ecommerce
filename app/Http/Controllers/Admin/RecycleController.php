<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Partner;
use App\Models\Prodcategory;
use App\Models\Product;

class RecycleController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user = User::where('user_status',0)->get();
        $banner = Banner::where('ban_status',0)->orderBy('ban_id','ASC')->get();
        $brand = Brand::where('brand_status',0)->orderBy('brand_id','ASC')->get();
        $partner = Partner::where('partner_status',0)->orderBy('partner_id','ASC')->get();
        $category = Prodcategory::where('pro_cate_status',0)->orderBy('pro_cate_id','ASC')->get();
        $product = Product::where('product_status',0)->orderBy('product_id','ASC')->get();
        return view('admin.recycle.recycle',compact('user','banner','brand','partner','category','product'));
    }

}
