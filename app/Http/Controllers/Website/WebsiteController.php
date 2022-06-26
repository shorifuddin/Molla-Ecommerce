<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Prodcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;
use App\Models\User;

use Cart;

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

    public function login(){
        if (Auth::check()) {
           return redirect()->route('website');
        }else{
            return view('website.login');
        }
    }

    public function login_access(Request $request){
       $this->validate($request,[
        'email' => 'required|email',
        'password' => 'required',
       ]);
       $user = User::where('email',$request->email)->first();
       if ($user) {
        if (Hash::check($request->password,$user->password)) {
            Auth::login($user);
            return redirect()->route('website');
        }else{
            return redirect()->back()->with('error','Password is incorrect');
        }
       }else{
        return redirect()->back()->with('error','User is incorrect');
       }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'slug' => Str::slug('u'.$request->name, '-'),
            'password' => Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('website');
    }



    public function productview($slug){
        $data=Product::where('product_status',1)->where('product_slug',$slug)->first();
        return view('website.product',compact('data'));
    }


}
