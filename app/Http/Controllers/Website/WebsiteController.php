<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Prodcategory;

class WebsiteController extends Controller
{
    public function index(){
        return view('website.index');
    }

    public function shop(){
        return view('website.shop');
    }

    public function product(){
        return view('website.productcat');
    }

    public function blog(){
        return view('website.blog');
    }

    public function about(){
        return view('website.about');
    }

    public function contact(){
        return view('website.contact');
    }

    public function productview($slug){
        $data=Product::where('product_status',1)->where('product_slug',$slug)->first();
        return view('website.product',compact('data'));
    }
}
