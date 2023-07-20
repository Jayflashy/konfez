<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Cache;
use Storage;
use Illuminate\Support\Facades\App;
use App\Models\Language;
class LanguageController extends Controller
{
    //
    public function index()
    {        
        $languages = Language::all()->sortByDesc('id');
    	return view('back.language.index', compact('languages'));
    }

    public function create()
    {        
    	return view('back.language.create');
    }

    public function store(Request $request)
    {
        $language = new Language();
        $language->name = $request->name;
        if ($request->rtl != null) {
            $language->rtl = $request->rtl;
        } else {
            $language->rtl = 0;
        }        
        $language->code = $request->code;
        $language->is_default = 0;
        if($language->save()){
            saveLANGFile($language->code, openLANGFile('def'));
            return redirect()->route('language.index')->withSuccess(__('New language Added Successfully.'));
        }        
    }

    public function status($id,$status)
    {
        Language::find($id)->update(['is_default' => $status]);
        $data = Language::where('id','!=',$id)->update(['is_default' => 0]);
        $code = Language::where('id',$id)->first()->code;

        App::setLocale($code);
        Session::put('locale', $code);
        return redirect()->route('language.index')->withSuccess(__('Status updated successfully.'));
    }
    
    public function edit($id)
    {
        $language = Language::find($id);
        return view('back.language.edit',compact('language'));
    }

    public function update(Request $request, $id)
    {
        $language = Language::find($id);

        $language->name = $request->name;
             
        if($request->rtl != null) {
            $language->rtl =1;
        }
        elseif($request->rtl == null) {
            $language->rtl =0;
        }

        $language->code = $request->code;
        $language->save();
        
        return redirect()->route('language.index')->withSuccess(__('Language updated successfully.'));
    }

    public function translate($id)
    {
        $language = Language::find($id);
        $json = file_get_contents(base_path('lang/') . $language->code . '.json');
        
        $json = json_decode($json);
        return view('back.language.translate',compact('language','json'));
    }

    public function translate_key(Request $request){
        // return $request->all();
        $key = array_filter(array_map('trim', explode(',', $request->key)));;

        return view('back.language.edit_modal' , compact('key'));
    }

    public function save_key(Request $request, $id)
    {
        $language = Language::find($id);
        $this->validate($request, [
            'key' => 'required',
            'value' => 'required'
        ]);

        $data = openLANGFile($language->code);
        $key = $request->key;
        $value = $request->value;
        $data[$key] = $value;
        
        saveLANGFile($language->code, $data);
        return redirect()->back()->withSuccess(__('Key added successfully.'));
    }

    public function edit_key(Request $request, $id)
    {
        // return $request->all();
        $this->validate($request, [
            'key' => 'required',
            'value' => 'required'
        ]);
        
        $language = Language::find($id);
        $data = openLANGFile($language->code);
        $key = $request->key;
        $value = $request->value;
        $data[$key] = $value;
        
        saveLANGFile($language->code, $data);
        // return $data;
        return redirect()->back()->withSuccess(__('Key updated successfully.'));
    }

    public function destroy($id)
    {
        $language = Language::find($id);
        $language->delete();
        return redirect()->route('language.index')->withSuccess(__('Language deleted successfully.'));

    }
    
}
