<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Str;
use DB;

class PageController extends Controller
{
    //
    public function index ()
    {
        $pages = Page::all();
        return view('back.pages.index' ,compact('pages'));
    }
    public function create ()
    {
        return view('back.pages.create');
    }
    public function store(Request $request)
    {
        $page = new Page();
        $page->title = $request->title;
        $page->body = $request->body;
        $page->slug = $this->createSlug($request->title, 'pages');   
        $page->save();
        return redirect()->route('pages.index')->withSuccess(__('Page Created Successfully'));
    }
    public function edit ($id)
    {
        $page = Page::find($id);
        return view('back.pages.edit' ,compact('page'));
    }

    public function update ($id, Request $request)
    {
        if(Page::where('id','!=', $id)->where('slug', $request->slug)->first() == null){
            $page = Page::find($id);
            $page->title = $request->title;
            $page->body = $request->body;
            $page->slug = $this->createSlug($request->slug, 'pages');  
            $page->save();
            return redirect()->route('pages.index')->withSuccess(__("Page updated successfully"));
        }    
    	return redirect()->back()->withError(__('Slug has been used. Try again'));
    }

    //Create unique slug
    public function createSlug($name ,$model)
    {
        $slug = Str::slug($name);
        $allSlugs = $this->getRelatedSlugs($slug , $model);
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
    protected function getRelatedSlugs($slug , $model)
    {
        // return Page::select('slug')->where('slug', 'like', $slug.'%')->get();
        return DB::table($model)->where('slug', 'LIKE', $slug . '%')->get();
    }
}
