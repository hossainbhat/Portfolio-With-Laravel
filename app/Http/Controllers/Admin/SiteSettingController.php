<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Image;

class SiteSettingController extends Controller
{
    public function siteSetting(Request $request){
        if($request->isMethod("post")){
            $setting = SiteSetting::first();

            if ($request->hasFile('logo')) {
                $image_temp = $request->file('logo');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $imagePath = 'assets/uploads/setting/'.$imageName;
                    Image::make($image_temp)->save($imagePath);

               }
            }else if($setting->logo){
                $imagePath = $setting->logo;
            }

            if ($request->hasFile('fave_icon')) {
                $image_temp = $request->file('fave_icon');
                if ($image_temp->isValid()) {

                    $extention = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111,99999).'.'.$extention;
                    $faveIconPath = 'assets/uploads/setting/'.$imageName;
                    Image::make($image_temp)->save($faveIconPath);

               }
            }else if($setting->fave_icon){
                $faveIconPath = $setting->fave_icon;
            }

            if(empty($setting)){
                $siteSetting = new SiteSetting;
                $siteSetting->email = $request->email;
                $siteSetting->mobile = $request->mobile;
                $siteSetting->description = $request->description;
                $siteSetting->facebook = $request->facebook;
                $siteSetting->twitter = $request->twitter;
                $siteSetting->youtube = $request->youtube;
                $siteSetting->github = $request->github;
                $siteSetting->total_project = $request->total_project;
                $siteSetting->experience_year = $request->experience_year;
                $siteSetting->happy_customer = $request->happy_customer;
                $siteSetting->awards = $request->awards;
                $siteSetting->fave_icon = $faveIconPath;
                $siteSetting->logo = $imagePath;
                $siteSetting->save();
            }else{
                $setting->email = $request->email;
                $setting->mobile = $request->mobile;
                $setting->description = $request->description;
                $setting->facebook = $request->facebook;
                $setting->twitter = $request->twitter;
                $setting->youtube = $request->youtube;
                $setting->github = $request->github;
                $setting->total_project = $request->total_project;
                $setting->experience_year = $request->experience_year;
                $setting->happy_customer = $request->happy_customer;
                $setting->awards = $request->awards;
                $setting->fave_icon = $faveIconPath;
                $setting->logo = $imagePath;
                $setting->update();
            }
            return Redirect()->back();
        }
        $setting = SiteSetting::first();
        return view("backend.setting.site_setting",compact('setting'));
    }
}
