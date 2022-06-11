<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function add(){
        return view('admin.role.addrole');
    }

    public function all(){
        $alldata=Role::all();
        return view('admin.role.allrole',compact('alldata'));
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'role_name' => 'required|max:255',
        ],[
            'role_name.required'=>'Fill The Role-Name',
        ]);

        $insert=Role::insert([
            'role_name'=>$request->role_name,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'value'); 
            return redirect('dashboard/role/all');
        }else{
            Session::flash('error', 'value'); 
            return redirect('dashboard/role/add');
        }
    }

    public function view($id){
        $data=Role::where('role_id',$id)->firstOrFail();
        return view('admin.role.viewrole',compact('data'));
    }

    public function edit($id){
        $data=Role::where('role_id',$id)->firstOrFail();
        return view('admin.role.editrole',compact('data'));
    }

    public function update(Request $request){
        $id=$request->role_id;
        $update=Role::where('role_id',$id)->update([
            'role_name'=>$request->role_name,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success','value');
            return redirect('dashboard/role/all');
        }else{
            Session::flash('error','value');
            return redirect('dashboard/role/edit/'.$id);
        }
    }
}
