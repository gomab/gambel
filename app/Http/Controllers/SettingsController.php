<?php

namespace App\Http\Controllers;

use App\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * SettingsController constructor.
     */
   public function __construct()
   {
       $this->middleware('admin');
   }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $settings = Setting::first();

        return view('admin.settings.settings', compact('settings'));
    }


    public function update(){

        $this->validate(request(), [
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required|email',
            'address' => 'required',
        ]);

        $settings = Setting::first();

        $settings->site_name = request()->site_name;
        $settings->contact_number = request()->contact_number;
        $settings->contact_email = request()->contact_email;
        $settings->address = request()->address;
        $settings->save();

        Toastr::success('Settings MAJ.', 'Title', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }
}
