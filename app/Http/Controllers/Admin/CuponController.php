<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cupon;
use Session;
use Auth;

class CuponController extends Controller{

    public function __construct(){
        $this->middleware('auth');
    }

    public function add(){
        return view('admin.cupon.add');
    }

    public function store(Request $request){

        $request->validate([
            'coupon_name' => 'required',
            'coupon_code' => 'required',
            'coupon_amount' => 'required',
            'coupon_starting' => 'required',
            'coupon_ending' => 'required',
        ]);
        $coupon = Cupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_amount' => $request->coupon_amount,
            'coupon_starting' => $request->coupon_starting,
            'coupon_ending' => $request->coupon_ending,
            'coupon_remarks' => $request->coupon_remarks,
            'coupon_creator' => Auth::user()->id,
            'coupon_slug' => uniqid($request->coupon_name),
        ]);
        if ($coupon) {
            Session::flash('success', 'Coupon Create successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Coupon Create Failed!');
            return redirect()->back();
        }
    }

    public function all(){
        $alldata=Cupon::where('coupon_status',1)->orderBy('coupon_id','DESC')->get();
        return view('admin.cupon.all',compact('alldata'));
    }

    public function view($id){
        $data=Cupon::where('coupon_status',1)->where('coupon_id',$id)->firstOrFail();
        return view('admin.cupon.view',compact('data'));
    }

    public function edit($id){
        $data=Cupon::where('coupon_status',1)->where('coupon_id',$id)->firstOrFail();
        return view('admin.cupon.edit',compact('data'));
    }

    public function update(Request $request ,$id){

        $request->validate([
            'coupon_name' => 'required',
            'coupon_code' => 'required',
            'coupon_amount' => 'required',
            'coupon_starting' => 'required',
            'coupon_ending' => 'required',
        ]);
        $coupon = Cupon::where('coupon_status', 1)->where('coupon_id', $id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_code' => $request->coupon_code,
            'coupon_amount' => $request->coupon_amount,
            'coupon_starting' => $request->coupon_starting,
            'coupon_ending' => $request->coupon_ending,
            'coupon_remarks' => $request->coupon_remarks,
            'coupon_editor' => Auth::user()->id,
            'coupon_slug' => uniqid($request->coupon_name),
        ]);
        if ($coupon) {
            Session::flash('success', 'Coupon Create successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Coupon Create Failed!');
            return redirect()->back();
        }
    }

    public function softdelete($id)
    {
        $coupon = Cupon::where('coupon_status', 1)->where('coupon_id', $id)->update([
            'coupon_status' => 0
        ]);

        if ($coupon) {
            Session::flash('success', 'Coupon Delete successfully');
            return redirect()->back();
        } else {
            Session::flash('error', 'Coupon Delete Failed!');
            return redirect()->back();
        }
    }

    public function restore(){
        $alldata = Cupon::where('coupon_status',0)->orderBy('coupon_id','ASC')->get();
        return view('admin.cupon.restore',compact('alldata'));
    }

    public function restoredata($id){
        $restore = Cupon::where('coupon_status',0)->where('coupon_id',$id)->update([
            'coupon_status'=> 1,
        ]);
        if($restore){
            Session::flash('success','Value');
            return redirect('/dashboard/cupon/all');
        }else{
            Session::flash('error','Value');
            return redirect('/dashboard/cupon/add');
        }
    }

    public function delete($id){
        $delete = Cupon::where('coupon_status',0)->where('coupon_id',$id)->delete();

        if ($delete) {
            Session::flash('success','Value');
           return redirect('dashboard/cupon/all');
        }else{
            Session::flash('error','Value');
            return redirect('dashboard/cupon/restore');

        }
    }


}
