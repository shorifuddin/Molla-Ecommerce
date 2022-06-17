<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function quick(){
        return view('website.quick');
    }
}
