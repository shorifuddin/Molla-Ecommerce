<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function add(){
        return view('admin.producat.add');
    }

    public function all(){
        $alldata = Product::where('product_status',1)->orderBy('product_id','DESC')->get();
        return view('admin.producat.all',compact('alldata'));
    }

}
