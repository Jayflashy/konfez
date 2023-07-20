<?php
use App\Models\{
    Setting,
    SystemSetting,
    Language
};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

if (!function_exists('get_setting')) {
    function get_setting($key)
    {
        $settings = Setting::first();
        
        $setting = $settings->$key;
        
        return $setting;
    }
}

if (!function_exists('sys_setting')) {
    function sys_setting($key, $default = null)
    {
        $settings = SystemSetting::all();
        $setting = $settings->where('name', $key)->first();

        return $setting == null ? $default : $setting->value;
    }
}

if (!function_exists('static_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function static_asset($path, $secure = null)
    {
        return app('url')->asset('public/assets/' . $path, $secure);
    }
}

//return file uploaded via uploader
if (!function_exists('uploaded_asset')) {
    function uploaded_asset($path, $secure = null)
    {
        return app('url')->asset('public/uploads/' . $path, $secure);
    }
}

if (!function_exists('getBaseURL')) {
    function getBaseURL()
    {
        $root = $_SERVER['HTTP_HOST'];
        $root .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

        return $root;
    }
}

if (!function_exists('get_language')) {
    function get_language($default = null)
    {
        if(Session::has('locale')){
            $code = Session::get('locale');
        }
        else{
            $code = Config::get('app.locale');
        }

        $language = Language::where('code', $code)->first();

        $default =  '{"id":1,"name":"English","code":"en","rtl":0,"is_default":1,"created_at":"2022-01-14T06:49:59.000000Z","updated_at":"2022-01-16T18:49:46.000000Z"}';
        
        return $language == null ? $default : $language;
    }
}


/**
 * Open Language Translation File
 * @return Response
*/
function openLANGFile($code){
    $jsonString = [];
    if(File::exists(base_path('lang/'.$code.'.json'))){
        $jsonString = file_get_contents(base_path('lang/'.$code.'.json'));
        $jsonString = json_decode($jsonString, true);
    }
    return $jsonString;
}

/**
 * Save language JSON File
 * @return Response
*/
function saveLANGFile($code, $data){
    ksort($data);
    $jsonData = json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    file_put_contents(base_path('lang/'.$code.'.json'), stripslashes($jsonData));
}

//Create unique slug
function createSlug($name ,$model)
{
    $slug = Str::slug($name);
    $allSlugs = getRelatedSlugs($slug , $model);
    if (! $allSlugs->contains('slug', $slug)){
        return $slug;
    }

    $i = 1;
    $is_contain = true;
    do {
        $newSlug = $slug . '-' . $i;
        if (!$allSlugs->contains('slug', $newSlug)) {
            $is_contain = false;
            return $newSlug;
        }
        $i++;
    } while ($is_contain);
}
function getRelatedSlugs($slug , $model)
{
    return DB::table($model)->where('slug', 'LIKE', $slug . '%')->get();
}

// Install copy files
function install_files($name)
{
    $file = base_path('storage/install/'.$name);
    return $file;
}