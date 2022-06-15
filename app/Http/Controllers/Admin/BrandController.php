<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use Session;
use Image;

class BrandController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function add(){
        return view('admin.brand.add');
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|max:100',
            'brand_remaks' => 'required|max:255',
            'brand_image' => 'required',
        ],[
            'brand_name.required'=>'Fill The Brand-Name',
            'brand_name.unique'=> 'This Brand-Name already Added',
            'brand_remaks.required'=>'Fill The Brand Remaks',
            'brand_image.required'=>'Upload The Image',
        ]);
        $slug=Str::slug($request->brand_name,'-');
        $creator=Auth::user()->id;
        $insert=Brand::insertGetId([
            'brand_name'=>$request->brand_name,
            'brand_remaks'=>$request->brand_remaks,
            'brand_image'=>$request->brand_image,
            'brand_slug'=>$slug,
            'brand_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('brand_image')) {
            $pic=$request->file('brand_image');
            $imgname='brandimg-' . time().'-'.'.'. $pic->getClientOriginalExtension();
            Image::make($pic)->resize(720, 720)->save('upload/brand/'.$imgname);

            brand::where('brand_id', $insert)->update([
                'brand_image'=>$imgname,
            ]);
         }

        if($insert){
            Session::flash('success','Value');
            return redirect('/dashboard/brand/all');
        }else{
            Session::flash('error','Value');
            return redirect('/dashboard/brand/add');
        }
    }

    public function all(){
        $alldata=brand::where('brand_status',1)->orderBy('brand_id','DESC')->get();
        return view('admin.brand.all',compact('alldata'));
    }

    public function view($brandid){
        $data=Brand::where('brand_status',1)->where('brand_id',$brandid)->firstOrFail();
        return view('admin.brand.view',compact('data'));
    }

    public function edit($id){
        $data=Brand::where('brand_status',1)->where('brand_id',$id)->firstOrFail();
        return view('admin.brand.edit',compact('data'));
    }

    public function update(Request $request, $id){
        // return $request->all();
        $validated = $request->validate([
            'brand_name' => 'required|max:255',
            'brand_remaks' => 'required|max:255',
        ],[
            'brand_remaks.required'=>'Fill The Remaks',
        ]);

        $id = $request->brand_id;
        $slug = $request->brand_slug;
        $brand = Brand::where('brand_id', $id)->where('brand_slug', $slug)->firstOrFail();

        if ($request->hasFile('brand_image')) {
           $pic = $request->file('brand_image');
           $imagename = 'brand'. time() . '.' .$pic->getClientOriginalExtension();
           Image::make($pic)->resize(720, 720)->save('upload/brand/'.$imagename);
        }else{
            $imagename = $brand->brand_image;
        }

        $update=Brand::where('brand_id',$id)->update([
            'brand_name' => $request['brand_name'],
            'brand_slug' => Str::slug($request->brand_name, '-'),
            'brand_remaks' => $request['brand_remaks'],
            'brand_image' => $imagename,
            'brand_editor' => Auth::user()->id,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect()->route('brand.all');
        }else{
            Session::flash('error','Value');
            return redirect()->route('brand.all');
        }
    }

    public function softdelete($id){
        $softdelete=Brand::where('brand_status',1)->where('brand_id',$id)->update([
            'brand_status'=> 0,
        ]);
        if($softdelete){
            Session::flash('success','Value');
            return redirect('/dashboard/brand/all');
        }else{
            Session::flash('error','Value');
            return redirect('/dashboard/brand/add');
        }
    }

    public function restore(){
        $alldata=Brand::where('brand_status',0)->orderBy('brand_id','ASC')->get();
        return view('admin.brand.restore',compact('alldata'));
    }

    public function restoredata($id){
        $restore=Brand::where('brand_status',0)->where('brand_id',$id)->update([
            'brand_status'=> 1,
        ]);
        if($restore){
            Session::flash('success','Value');
            return redirect('/dashboard/brand/all');
        }else{
            Session::flash('error','Value');
            return redirect('/dashboard/brand/add');
        }
    }

    public function delete($id){
        $delete=Brand::where('brand_status',0)->where('brand_id',$id)->delete();

        if ($delete) {
            Session::flash('success','Value');
           return redirect('dashboard/brand/all');
        }else{
            Session::flash('error','Value');
            return redirect('dashboard/brand/restore');

        }
    }


}
