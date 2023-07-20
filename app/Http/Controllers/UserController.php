<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Show user dashboard
    public function index()
    {
        $user = Auth::user();
        $messages = Message::where('user_id', $user->id)->orderByDesc('id')->limit(10)->get();
        $posts = Post::where('user_id', $user->id)->orderByDesc('id')->limit(10)->get();
        return view('front.user.index', compact('user','posts','messages'));
    }

    //Show user received Messages
    public function messages(Request $request)
    {
        $messages = Message::where('user_id', Auth::user()->id)->orderByDesc('id')->simplePaginate(15);
        if ($request->ajax()){
            $view = view('sub.message',compact('messages'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('front.user.message', compact('messages'));
    }

    // Report Message 
    function report_message ($id)
    {
        $message = Message::find($id);
        if (Auth::id() == $message->user_id) {
            $message->delete();
            return redirect()->route('user.dashboard')->withSuccess(__('Message report succussful'));
        }
        return redirect()->route('user.dashboard')->withError(__('Something went wrong'));
    }
    //Show user  Confessions
    public function posts()
    {
        $posts = Post::where('user_id', Auth::user()->id)->orderByDesc('id')->get();
        return view('front.user.posts', compact('posts'));
    }

    //Show user Comments
    public function comments()
    {
        $comments = Comment::where('user_id', Auth::user()->id)->orderByDesc('id')->get();
        return view('front.user.comments', compact('comments'));
    }

    //Edit User Profile
    public function profile()
    {
        return view('front.user.profile');
    }

    //Update User Profile
    public function update(Request $request)
    {
        // Validate requests
        $request->validate([
            'email' => 'required|email',
            'username' => 'required|string',
            'name' => 'required',
            'password' => 'nullable|string'
        ]);

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
}
