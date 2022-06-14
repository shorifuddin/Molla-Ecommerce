<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Prodcategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;
use File;

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

    public function insert(Request $request){
        // dd($request->product_gallery);
        // $validated = $request->validate([
        //     'product_name' => 'required|max:100',

        // ],[
        //     'product_name.required'=>'Fill The Prodcategory-Name',
        //     'product_name.unique'=> 'This Prodcategory-Name already Added',

        // ]);

        $insert = Product::insertGetId([
            'product_name' => $request->product_name,
            'pro_category_id' => $request->pro_category_id,
            'brand_id' => $request->brand_id,
            'product_price' => $request->product_price,
            'product_discount_price' => $request->product_discount_price,
            'product_order' => $request->product_order,
            'product_quantity' => $request->product_quantity,
            'product_unit' => $request->product_unit,
            'product_feature' => $request->product_feature,
            'product_detils' => $request->product_detils,
            'product_description' => $request->product_description,
            'product_slug' => uniqid(),
            'product_creator' => Auth::user()->id,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        // Product Image Update
        if ($request->hasFile('product_image')) {
            $pic=$request->file('product_image');
            $imgname = 'product' . time() . '.' . $pic->getClientOriginalExtension();
            Image::make($pic)->save('upload/product/'.$imgname);
            Product::where('product_id', $insert)->update([
                'product_image' => $imgname,
            ]);
         }

        // Multiple Image
        if($request->file('product_gallery')){
            $gallerys = $request->file('product_gallery');
            foreach($gallerys as $gallery){
                $gallery_name = 'pro' . '_' . rand(100000, 10000000) . '.' . $gallery->getClientOriginalExtension();
                Image::make($gallery)->resize(120, 120)->save('upload/product/gallery/' . $gallery_name);
                $data[] = $gallery_name;
            }
            Product::where('product_id', $insert)->update([
                'product_gallery' => implode(',', $data),
            ]);
        }

        if($insert){
            Session::flash('success','Value');
            return redirect('dashboard/product/all');
        }else{
            Session::flash('error','Value');
            return redirect('dashboard/product/add');
        }
    }

    public function view($id){
        $data=Product::where('product_status',1)->where('product_id',$id)->first();
        return view('admin.producat.view',compact('data'));
    }

    public function edit($id){
        $data=Product::where('product_status',1)->where('product_id',$id)->first();
        return view('admin.producat.edit',compact('data'));
    }
}
