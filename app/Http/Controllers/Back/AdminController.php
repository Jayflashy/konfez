<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Artisan;
use Hash;
use App\Models\Comment;
use App\Models\Post;

class AdminController extends Controller
{
    //
    public function index()
    {
        $posts = Post::orderByDesc('id')->limit(30)->get();        
        $comments = Comment::orderByDesc('id')->limit(30)->get();
        return view('back.index',compact('posts','comments'));
    }

    function login(){
        if (Auth::check()){
            if (Auth::user()->user_role == 'admin' || Auth::user()->user_role == 'staff'){
                return $this->index();
            }
            else{
                return redirect()->route('index');
            }
        }
        else {
            return view('back.login');
        }
        
    }
    
    function profile(){
        return view('back.profile');
    }

    function update_profile (Request $request){

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        
        if($request->password != null){
            $user->password = Hash::make($request->password);        
        }
        $user->save();
        return back()->withSuccess(__('Profile Updated Successfully.'));
    }
     /**
     * Remove the website cache
     *
     * @param  int 
     * @return \Illuminate\Http\Response
     */
    public function clearCache()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return back()->with('success',__('Cache Cleared Successfully.'));
    }

    /**
     * Show mainenance mode
     *
     * @param  int 
     * @return \Illuminate\Http\Response
     */
    public function maintenance()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return view('back.maintenance');
    }

}
