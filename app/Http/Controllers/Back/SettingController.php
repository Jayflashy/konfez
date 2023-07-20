<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Artisan;
use App\Models\SystemSetting;

class SettingController extends Controller
{
    //
        
    public function envkeyUpdate(Request $request)
    {
        foreach ($request->types as $key => $type) {
            $this->overWriteEnvFile($type, $request[$type]);
        }
        return back()->withSuccess(__("Settings updated successfully"));
       
    }

    public function update(Request $request)
    {
        $input = $request->all();

        if($request->hasFile('favicon')){
            $image = $request->file('favicon');

            $imageName = 'favicon.png';
            $image->move(public_path('uploads'),$imageName);
           
            $input['favicon'] =$imageName;
        }

        if($request->hasFile('logo')){
            $image = $request->file('logo');

            $imageName = 'logo.png';
            $image->move(public_path('uploads'),$imageName);
           
            $input['logo'] =$imageName;
        }

        $setting = Setting::first();
        $setting->update($input);
        return redirect()->back()->withSuccess(__('Settings Updated Successfully.'));
    }

    function updateFeatures(Request $request)
    {
        $setting = Setting::first();
        $value = $request->value;
        $name = $request->name;
        $setting->$name = $value;
        $setting->save();
        return '1';
    }

    function systemUpdate(Request $request)
    {
        $setting = SystemSetting::where('name', $request->name)->first();
        if($setting !=null){            
            $setting->value = $request->value;
            $setting->save();
        }
        else{
            $setting = new SystemSetting;
            $setting->name = $request->name;
            $setting->value = $request->value;
            $setting->save();
        }
        
        return '1';
    }

    public function store_settings(Request $request)
    {

        foreach ($request->types as $key => $type) {
            if($type == 'site_name'){
                $this->overWriteEnvFile('APP_NAME', $request[$type]);
            }
            else {
                $sys_settings = SystemSetting::where('name', $type)->first();

                if($sys_settings!=null){
                    if(gettype($request[$type]) == 'array'){
                        $sys_settings->value = json_encode($request[$type]);
                    }
                    else {
                        $sys_settings->value = $request[$type];
                    }
                    $sys_settings->save();
                }
                else{
                    $sys_settings = new SystemSetting;
                    $sys_settings->name = $type;
                    if(gettype($request[$type]) == 'array'){
                        $sys_settings->value = json_encode($request[$type]);
                    }
                    else {
                        $sys_settings->value = $request[$type];
                    }
                    $sys_settings->save();
                }
            }
        }

        Artisan::call('cache:clear');

        return redirect()->back()->withSuccess(__('Settings Updated Successfully.'));
    }
    
    
    public function general_setting()
    {
    	return view('back.setup.settings');
    }
    public function features()
    {
    	return view('back.setup.features');
    }
    public function smtp()
    {
    	return view('back.setup.smtp');
    }
    public function google ()
    {
    	return view('back.setup.google');
    }
    public function facebook ()
    {
    	return view('back.setup.facebook');
    }

    public function overWriteEnvFile($type, $val)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            $val = '"'.trim($val).'"';
            if(is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0){
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
            }
            else{
                file_put_contents($path, file_get_contents($path)."\r\n".$type.'='.$val);
            }
        }
    }
}
