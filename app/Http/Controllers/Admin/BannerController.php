<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\banner;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Auth;
use Image;

class BannerController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function all(){
        $alldata=banner::where('ban_status',1)->orderBy('ban_id','DESC')->get();
        return view('admin.banner.allban',compact('alldata'));

    }

    public function add(){
        return view('admin.banner.addban');

    }

    public function edit($id){
        $data=banner::where('ban_status',1)->where('ban_id',$id)->firstOrFail();
        return view('admin.banner.editban',compact('data'));

    }

    public function view($banid){
        $data=banner::where('ban_status',1)->where('ban_id',$banid)->firstOrFail();
        return view('admin.banner.viewban',compact('data'));
    }
    		
    public function insert(Request $request){
        
        $validation=$request->validate([
            'bantitle'=>'required|max:100',
            'bansubtitle'=>'required|max:200',
            
        ],[
            'bantitle.required'=>'Please Enter The Title*',
            'bantitle.max'=>'Please Enter The Title At Least 100 character*',

            'bansubtitle.required'=>'Please Enter The Banner-Title*',
            'bansubtitle.max'=>'Please Enter The Ban-Title At Least 100 character*',

        ]);
        $creator=Auth::user()->id;
        //$slug=uniqid('BEPS-');
        $slug=Str::slug($request->bantitle,'-');
        $insert=banner::insertGetId([
            'ban_title'=>$request['bantitle'],
            'ban_subtitle'=>$request['bansubtitle'],
            'ban_btn'=>$request['banbtn'],
            'ban_btnurl'=>$request['btnurl'],
            'ban_img'=>$request['img'],
            //'ban_slug'=>$request['banslug'],
            'ban_slug'=>$slug,
            'ban_creator'=>$creator,
  
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('img')) {
           $pic=$request->file('img');
           $imgname='banner' . time().'.'. $pic->getClientOriginalExtension();
           Image::make($pic)->save('upload/banner/'.$imgname);

           banner::where('ban_id', $insert)->update([
               'ban_img'=>$imgname,
           ]);
        }

        if ($insert) {
            Session::flash('success','Value');
           return redirect('dashboard/banner/all');
        }else{
            Session::flash('error','Value');
           return redirect('dashboard/banner/add');
           
        }
    }

    public function update(Request $request){
        $validation=$request->validate([
            'bantitle'=>'required|max:100',
            'bansubtitle'=>'required|max:200',
            
        ],[
            'bantitle.required'=>'Please Enter The Title*',
            'bantitle.max'=>'Please Enter The Title At Least 100 character*',

            'bansubtitle.required'=>'Please Enter The Banner-Title*',
            'bansubtitle.max'=>'Please Enter The Ban-Title At Least 100 character*',

        ]);
        $editor=Auth::user()->id;
        $id=$request['id'];
        $slug=$request['slug'];
       
       $update=banner::where('ban_status',1)->where('ban_id',$id)->update([
            'ban_title'=>$request['bantitle'],
            'ban_subtitle'=>$request['bansubtitle'],
            'ban_btn'=>$request['banbtn'],
            'ban_btnurl'=>$request['btnurl'],
            'ban_editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('img')) {
           $pic=$request->file('img');
           $imgname='banner' . time().'.'. $pic->getClientOriginalExtension();
           Image::make($pic)->save('upload/banner/'.$imgname);

           banner::where('ban_id', $id)->update([
               'ban_img'=>$imgname,
           ]);
        }

        if ($update) {
            Session::flash('success','Value');
           return redirect('dashboard/banner/view/'.$id);
        }else{
            Session::flash('error','Value');
           return redirect('dashboard/banner/edit/'.$id);
           
        }
    }

    public function softdelete($id){
        $softdelete=banner::where('ban_status',1)->where('ban_id',$id)->update([
            'ban_status'=> 0
        ]);

        if ($softdelete) {
            Session::flash('success','Value');
           return redirect('dashboard/banner/all');
        }else{
            Session::flash('error','Value');
            return redirect('dashboard/banner/all/'.$id);
           
        }
    }

    public function restoredata(){
        $restoredata=banner::where('ban_status',0)->orderBy('ban_id','DESC')->get();
        return view('admin.banner.restoredata',compact('restoredata'));

    }

    public function restore($id){
        $restore=banner::where('ban_status',0)->where('ban_id',$id)->update([
            'ban_status'=> 1
        ]);

        if ($restore) {
            Session::flash('success','Value');
           return redirect('dashboard/banner/all');
        }else{
            Session::flash('error','Value');
            return redirect('dashboard/banner/add');
           
        }
    }
    
    public function delete($id){
        $delete=banner::where('ban_status',0)->where('ban_id',$id)->delete();

        if ($delete) {
            Session::flash('success','Value');
           return redirect('dashboard/banner/all');
        }else{
            Session::flash('error','Value');
            return redirect('dashboard/banner/all');
           
        }
    }
}
