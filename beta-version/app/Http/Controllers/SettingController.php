<?php

namespace App\Http\Controllers;

use App\Models\setting;
use App\Models\socialLink;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Photo;

class SettingController extends Controller
{
    //=========== site_setting ============
    function site_setting(){
        return view('backend.setting.site_setting');
    }

    //=========== setting_store ============
    function setting_store(Request $request){
        $request->validate([
            'site_name'     => 'required',
            'site_logo'     => 'required',
            'site_fav'      => 'required',
            'meta_title'    => 'required',
            'meta_tags'     => 'required',
            'meta_descp'    => 'required',
        ]);

        Photo::upload($request->site_logo ,'uploads/setting','set',['500','500']);
        Photo::upload($request->site_fav ,'uploads/setting','set',['500','500']);
        setting::insert([
            'site_name'     => $request->name,
            'site_logo'     => Photo::$name,
            'site_fav'      => Photo::$name,
            'meta_title'    => $request->meta_title,
            'meta_tags'     => $request->meta_tags,
            'meta_descp'    => $request->meta_descp,
            'status'        => $request->status,
            'created_at'    => Carbon::now(),
        ]);

        Alert::toast('Success Toast','success');
        return back();

    }

    //=========== social_link ============
    function social_link(){
        return view('backend.setting.social_link');
    }

    //=========== social_icon ============
    function social_icon(Request $request){

        $request->validate([
            'icon'     => 'required',
            'link'     => 'required',
        ]);

        socialLink::insert([
            'icon'          => $request->icon,
            'link'          => $request->link,
            'status'        => $request->status,
            'created_at'    => Carbon::now(),
        ]);
        Alert::toast('Social icon add Successfully','success');
        return back();
    }
}
