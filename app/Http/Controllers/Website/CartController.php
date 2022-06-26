<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

class CartController extends Controller{

    public function index(){
        $allcart = Cart::getContent();
        return view('website.cart', compact('allcart'));
    }

    public function store($slug){
        $products = Product::where('product_status',1)->where('product_slug',$slug)->firstOrFail();
        Cart::add([
            'id' => $products->product_id, // inique row ID
            'name' => $products->product_name,
            'price' => $products->product_price,
            'quantity' => 1,
            'attributes' => [
                'image' => $products->product_image,
            ]
        ]);
        return redirect()->back();
    }

    public function destroy($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function cartitem(){
        $allcart = Cart::getContent();
        return view('layouts.website', compact('allcart'));
    }
}
