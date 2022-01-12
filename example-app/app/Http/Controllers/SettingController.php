<?php

namespace App\Http\Controllers;

use App\Helpers\FileManager;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::all()->first();
        return view('manage.setting.index',['setting'=>$setting]);
    }

    public function submit(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'required|max:200|mimes:png,jpg,svg',
                'header_title' => 'required|max:25',
                'header_text' => 'required|max:50',
                'about_text_1' => 'required|max:200',
                'about_text_2' => 'required|max:200',
                'address' => 'required|max:100',
                'footer_about' => 'required|max:100',
                'copyright' => 'required|max:100',
                'facebook' => 'required|max:100',
                'twitter' => 'required|max:100',
                'linkedin' => 'required|max:100',
                'dribbble' => 'required|max:100'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $setting = Setting::all()->first();
        $file = $request->file('image');
        if ($setting == null) {
            $path = FileManager::fileUpload($file, 'uploads/setting');
            Setting::create(
                [
                    'header_title' => $request->header_title,
                    'header_text' => $request->header_text,
                    'about_text_1' => $request->about_text_1,
                    'about_text_2' => $request->about_text_2,
                    'address' => $request->address,
                    'footer_about' => $request->footer_about,
                    'copyright' => $request->copyright,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'linkedin' => $request->linkedin,
                    'dribbble' => $request->dribbble,
                    'header_image' => $path
                ]
            );
        } else {
            if ($file != null) {
                FileManager::deleteFile(public_path('uploads/setting/'.$setting->header_image));
                $path = FileManager::fileUpload($file, 'uploads/setting');
                $setting->header_image = $path;
                $setting->save();
            }
            $setting->update([
                'header_title' => $request->header_title,
                'header_text' => $request->header_text,
                'about_text_1' => $request->about_text_1,
                'about_text_1' => $request->about_text_1,
                'address' => $request->address,
                'footer_about' => $request->footer_about,
                'copyright' => $request->copyright,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'linkedin' => $request->linkedin,
                'dribbble' => $request->dribbble
            ]);
        }
        return redirect()->back();
    }
}
