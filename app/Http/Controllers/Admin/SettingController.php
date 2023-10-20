<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\traits\UploadFile;

class SettingController extends Controller
{
    use UploadFile;

    public function index()
    {
        $settings = Setting::all();
        // dd($Settings);
        return view('Admin.Setting',['settings' => $settings]);
    }

    public function edit(Setting $setting)
    {
        return view('Admin.Setting',compact('setting'));
    }

    public function update(Request $request, Setting $setting)
    {

        // dd($setting);
        if ($request->hasFile('image'))
        {
            if ($setting->value) {
                $this->DeleteImage($setting->value,'/market/images/');
            }
            $filename=$this->UploadImage($request->image,'market/images/',false);
        }else {
            $filename = $request->name;
        }
        $setting->update([
            'value' => $filename
        ]);
        return redirect('dashboard/setting')->with('success', 'update success');
    }
}
