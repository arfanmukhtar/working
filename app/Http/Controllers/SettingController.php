<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $settings = DB::table('settings')->where('id', 1)->first();

        return view('settings/home', ['setting' => $settings, 'title' => 'Settings']);
    }

    public function save(Request $request)
    {
        $data = [
            'title'     => $request->input('title'),
            'address'   => $request->input('address'),
            'city'      => $request->input('city'),
            'state'     => $request->input('state'),
            'zip'       => $request->input('zip'),
            'longitude' => $request->input('longitude'),
            'latitude'  => $request->input('latitude'),
            'phone_no'  => $request->input('phone'),
            'facebook'  => $request->input('facebook'),
            'twitter'   => $request->input('twitter'),
            'google'    => $request->input('google'),
            'linkedin'  => $request->input('linkedin'),
            'youtube'   => $request->input('youtube'),
            'email'     => $request->input('email'),
        ];

        \Session::flash('flash_message', 'Settings Changed Successfully');
        DB::table('settings')->where('id', 1)->update($data);

        return redirect('settings');
    }
}
