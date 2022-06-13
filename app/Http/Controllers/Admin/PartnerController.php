<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Image;

class PartnerController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function add(){
        return view('admin.partner.add');
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'partner_name' => 'required|unique:Partners|max:100',
            'partner_url' => 'required|max:255',
            'partner_logo' => 'required|max:255',
        ],[
            'partner_name.required'=>'Fill The Partner-Name',
            'partner_name.unique'=> 'This Partner-Name already Added',
            'partner_url.required'=>'Fill The Partner Remaks',
            'partner_logo.required'=>'Upload The Image',
        ]);
        $slug=Str::slug($request->partner_name,'-');
        $creator=Auth::user()->id;
        $insert=Partner::insertGetId([
            'partner_name'=>$request->partner_name,
            'partner_url'=>$request->partner_url,
            'partner_logo'=>$request->partner_logo,
            'partner_slug'=>$slug,
            'partner_creator'=>$creator,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if ($request->hasFile('partner_logo')) {
            $pic=$request->file('partner_logo');
            $imgname='Partnerimg-' . time().'-'.'.'. $pic->getClientOriginalExtension();
            Image::make($pic)->save('upload/partner/'.$imgname);

            Partner::where('partner_id', $insert)->update([
                'partner_logo'=>$imgname,
            ]);
         }

        if($insert){
            Session::flash('success','Value');
            return redirect('/dashboard/partner/all');
        }else{
            Session::flash('error','Value');
            return redirect('/dashboard/partner/add');
        }
    }

    public function all(){
        $alldata=Partner::where('partner_status',1)->orderBy('partner_id','DESC')->get();
        return view('admin.partner.all',compact('alldata'));
    }

    public function view($id){
        $data=Partner::where('partner_status',1)->where('partner_id',$id)->firstOrFail();
        return view('admin.partner.view',compact('data'));
    }

    public function edit($id){
        $data=Partner::where('partner_status',1)->where('partner_id',$id)->firstOrFail();
        return view('admin.partner.edit',compact('data'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'partner_name' => 'required|max:255',
            'partner_url' => 'required|max:255',
        ],[
            'partner_url.required'=>'Fill The Remaks',
        ]);

        $slug = $request->partner_slug;
        $partner = Partner::where('partner_id', $id)->where('partner_slug', $slug)->firstOrFail();

        // Update Image
        if ($request->hasFile('partner_logo')) {
            if (File::exists('upload/partner/'.$partner->partner_logo)) {
                File::delete('upload/partner/'.$partner->partner_logo);
            }
           $pic = $request->file('partner_logo');
           $imagename = 'partner'. time() . '.' .$pic->getClientOriginalExtension();
           Image::make($pic)->resize(150, 150)->save('upload/partner/'.$imagename);
        }else{
            $imagename = $partner->partner_logo;
        }

        $update = Partner::where('partner_id',$id)->update([
            'partner_name' => $request['partner_name'],
            'partner_slug' => Str::slug($request->partner_name, '-'),
            'partner_url' => $request['partner_url'],
            'partner_logo' => $imagename,
            'partner_editor' => Auth::user()->id,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect()->route('partner.all');
        }else{
            Session::flash('error','Value');
            return redirect()->route('partner.all');
        }
    }

    public function softdelete($id){
        $softdelete = Partner::where('partner_status',1)->where('partner_id',$id)->update([
            'partner_status'=> 0,
        ]);
        if($softdelete){
            Session::flash('success','Value');
            return redirect('/dashboard/partner/all');
        }else{
            Session::flash('error','Value');
            return redirect('/dashboard/partner/add');
        }
    }

    public function restore(){
        $alldata = Partner::where('partner_status',0)->orderBy('partner_id','ASC')->get();
        return view('admin.partner.restore',compact('alldata'));
    }

    public function restoredata($id){
        $restore = Partner::where('partner_status',0)->where('partner_id',$id)->update([
            'partner_status'=> 1,
        ]);
        if($restore){
            Session::flash('success','Value');
            return redirect('/dashboard/partner/all');
        }else{
            Session::flash('error','Value');
            return redirect('/dashboard/partner/add');
        }
    }

    public function delete($id){
        $delete=Partner::where('partner_status',0)->where('partner_id',$id)->delete();

        if ($delete) {
            Session::flash('success','Value');
           return redirect('dashboard/partner/all');
        }else{
            Session::flash('error','Value');
            return redirect('dashboard/partner/restore');
        }
    }

}
