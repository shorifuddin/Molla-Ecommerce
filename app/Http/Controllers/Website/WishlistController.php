<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Wishlist;
class WishlistController extends Controller{

    public function index(){
        $wishlists = Wishlist::where('wish_status', 1)->get();
        return view('website.wishlist', compact('wishlists'));
    }

    public function store(Request $request , $slug){
        $product = Product::where('product_status',1)->where('product_slug',$slug)->first();
        // return $product;
        $wishlist = new Wishlist();
        $wishlist->product_id = $product->product_id;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->save();
        return redirect()->back();
    }

    public function destroy($slug){
        $product = Product::where('product_status', 1)->where('product_slug', $slug)->firstOrFail();
        Wishlist::where('wish_status', 1)->where('product_id', $product->product_id)->delete();
        return redirect()->back();
    }
}
