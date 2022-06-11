<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Basic;
use App\Models\Contactinfo;
use App\Models\socialmedia;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use Session;
use Image;
use File;


class ManageController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function basic(){
        $basic = Basic::where('basic_id', 1)->first();
        return view('admin.manage.basic', compact('basic'));
    }
    
    public function update(Request $request){   
        // return $request->all();
     
        $basic = Basic::where('basic_id', 1)->where('basic_status', 1)->firstOrFail();
        
        if ($request->hasFile('basic_header_logo')) {
           $pic = $request->file('basic_header_logo');
           $headname = 'head'. time() . '.' .$pic->getClientOriginalExtension();
           Image::make($pic)->resize(150, 150)->save('upload/basic/'.$headname);
        }else{
            $headname = $basic->basic_header_logo;
        }

        if ($request->hasFile('basic_footer_logo')) {
            $pic = $request->file('basic_footer_logo');
            $footname = 'foot'. time() . '.' .$pic->getClientOriginalExtension();
            Image::make($pic)->resize(150, 150)->save('upload/basic/'.$footname);
         }else{
             $footname = $basic->basic_footer_logo;
         }

         if ($request->hasFile('basic_favicon')) {
            $pic = $request->file('basic_favicon');
            $favicon = 'foot'. time() . '.' .$pic->getClientOriginalExtension();
            Image::make($pic)->resize(150, 150)->save('upload/basic/'.$favicon);
         }else{
             $favicon = $basic->basic_favicon;
         }

        $update=Basic::where('basic_id',1)->update([
            'basic_company' => $request['basic_company'],
            'basic_title' => $request['basic_title'],
            'basic_header_logo' => $headname,
            'basic_footer_logo' => $footname,
            'basic_favicon' => $favicon,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect('/dashboard/manage/basic');
        }else{
            Session::flash('error','Value');
            return redirect('/dashboard/manage/basic');
        }
    }

    public function contact(){
        $contact = Contactinfo::where('contact_id', 1)->first();
        return view('admin.manage.conatctinfo', compact('contact'));
    }

    public function contact_update(Request $request){   
        // return $request->all();
        $contact = Contactinfo::where('contact_id', 1)->where('contact_status', 1)->firstOrFail();
       
        $update=Contactinfo::where('contact_id',1)->update([
            'contact_phone_one' => $request['contact_phone_one'],
            'contact_phone_two' => $request['contact_phone_two'],
            'contact_email_one' => $request['contact_email_one'],
            'contact_email_two' => $request['contact_email_two'],
            'contact_address_one' => $request['contact_address_one'],
            'contact_address_two' => $request['contact_address_two'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect('/dashboard/manage/contact');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }

    public function social(){
        $social = socialmedia::where('sm_id', 1)->first();
        return view('admin.manage.socialmedia', compact('social'));
    }

    public function social_update(Request $request){   
        // return $request->all();
        $contact = socialmedia::where('sm_id', 1)->where('sm_status', 1)->firstOrFail();
       
        $update = socialmedia::where('sm_id',1)->update([
            'sm_facebook' => $request['sm_facebook'],
            'sm_twitter' => $request['sm_twitter'],
            'sm_linkedin' => $request['sm_linkedin'],
            'sm_dribbble' => $request['sm_dribbble'],
            'sm_youtube' => $request['sm_youtube'],
            'sm_slack' => $request['sm_slack'],
            'sm_instagram' => $request['sm_instagram'],
            'sm_behance' => $request['sm_behance'],
            'sm_google' => $request['sm_google'],
            'sm_reddit' => $request['sm_reddit'],
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($update){
            Session::flash('success','Value');
            return redirect('/dashboard/manage/social');
        }else{
            Session::flash('error','Value');
            return redirect()->back();
        }
    }
}
