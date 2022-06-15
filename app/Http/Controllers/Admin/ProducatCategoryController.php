<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodcategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use Session;
use Image;
use File;

class ProducatCategoryController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function add(){
        return view('admin.category.add');
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'pro_cate_name' => 'required|unique:prodcategories|max:100',

        ],[
            'pro_cate_name.required'=>'Fill The Prodcategory-Name',
            'pro_cate_name.unique'=> 'This Prodcategory-Name already Added',

        ]);
        $slug=Str::slug($request->pro_cate_name,'-');
        $creator=Auth::user()->id;
        $insert=Prodcategory::insertGetId([
            'pro_cate_name'=>$request->pro_cate_name,
            'pro_cate_parent'=>$request->pro_cate_parent,
            'pro_cate_icon'=>$request->pro_cate_icon,
            'pro_cate_image'=>$request->pro_cate_image,
            'pro_cate_slug'=>$slug,
            'pro_cate_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('pro_cate_icon')) {
            $pic=$request->file('pro_cate_icon');
            $iconname='pro_cate_icon' . time().'-'.'.'. $pic->getClientOriginalExtension();
            Image::make($pic)->resize(720, 720)->save('upload/category/icon/'.$iconname);

            Prodcategory::where('pro_cate_id', $insert)->update([
                'pro_cate_icon'=>$iconname,
            ]);
         }
         if ($request->hasFile('pro_cate_image')) {
            $pic=$request->file('pro_cate_image');
            $imgname='pro_cate_image' . time().'-'.'.'. $pic->getClientOriginalExtension();
            Image::make($pic)->resize(720, 720)->save('upload/category/'.$imgname);

            Prodcategory::where('pro_cate_id', $insert)->update([
                'pro_cate_image'=>$imgname,
            ]);
         }

        if($insert){
            Session::flash('success','Value');
            return redirect('dashboard/procatrgory/all');
        }else{
            Session::flash('error','Value');
            return redirect('dashboard/procatrgory/add');
        }
    }

    public function all(){
        $alldata=Prodcategory::where('pro_cate_status',1)->orderBy('pro_cate_id','DESC')->get();
        return view('admin.category.all',compact('alldata'));
    }

    public function view($id){
        $data=Prodcategory::where('pro_cate_status',1)->where('pro_cate_id',$id)->firstOrFail();
        return view('admin.category.view',compact('data'));
    }

    public function edit($id){
        $data=Prodcategory::where('pro_cate_status',1)->where('pro_cate_id',$id)->firstOrFail();
        return view('admin.category.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'pro_cate_name' => 'required|max:100',

        ],[
            'pro_cate_name.required'=>'Fill The Prodcategory-Name',
        ]);

        $id = $request->pro_cate_id;
        $slug = $request->pro_cate_slug;
        $procategory = Prodcategory::where('pro_cate_id', $id)->where('pro_cate_slug', $slug)->firstOrFail();

        if ($request->hasFile('pro_cate_icon')) {
            if (File::exists('upload/category/icon/'.$procategory->pro_cate_icon)) {
                File::delete('upload/category/icon/'.$procategory->pro_cate_icon);
            }

           $pic = $request->file('pro_cate_icon');
           $iconname = 'icon'. time() . '.' .$pic->getClientOriginalExtension();
           Image::make($pic)->resize(720, 720)->save('upload/category/icon/'.$iconname);
        }else{
            $iconname = $procategory->pro_cate_icon;
        }

        if ($request->hasFile('pro_cate_image')) {
            if (File::exists('upload/category/'.$procategory->pro_cate_image)) {
                File::delete('upload/category/'.$procategory->pro_cate_image);
            }

           $pic = $request->file('pro_cate_image');
           $imagename = 'img'. time() . '.' .$pic->getClientOriginalExtension();
           Image::make($pic)->resize(720, 720)->save('upload/category/'.$imagename);
        }else{
            $imagename = $procategory->pro_cate_image;
        }

        $update=Prodcategory::where('pro_cate_id',$id)->update([
            'pro_cate_name' => $request['pro_cate_name'],
            'pro_cate_slug' => Str::slug($request->pro_cate_name, '-'),
            'pro_cate_parent' => $request['pro_cate_parent'],
            'pro_cate_icon' => $iconname,
            'pro_cate_image' => $imagename,
            'pro_cate_editor' => Auth::user()->id,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect()->route('procategory.all');
        }else{
            Session::flash('error','Value');
            return redirect()->route('procategory.edit',$id);
        }
    }

    public function softdelete($id){
        $softdelete=Prodcategory::where('pro_cate_status',1)->where('pro_cate_id',$id)->update([
            'pro_cate_status'=> 0,
        ]);
        if($softdelete){
            Session::flash('success','Value');
            return redirect()->route('procategory.all');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }

    public function restore(){
        $alldata=Prodcategory::where('pro_cate_status',0)->orderBy('pro_cate_id','ASC')->get();
        return view('admin.category.restore',compact('alldata'));
    }

    public function restoredata($id){
        $restore=Prodcategory::where('pro_cate_status',0)->where('pro_cate_id',$id)->update([
            'pro_cate_status'=> 1,
        ]);
        if($restore){
            Session::flash('success','Value');
            return redirect()->route('procategory.all');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }

    public function delete($id){
        $delete=Prodcategory::where('pro_cate_status',0)->where('pro_cate_id',$id)->delete();

        if ($delete) {
            Session::flash('success','Value');
           return redirect()->route('procategory.all');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }
}
