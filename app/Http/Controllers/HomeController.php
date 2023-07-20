<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Page;
use App\Models\User;
use App\Models\Message;
use App\Models\View;
use Illuminate\Http\Request;
use Session;
class HomeController extends Controller
{
      /**
     * Show the application Homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = Post::where('status',1)->orderByDesc('created_at')->simplePaginate(20);
        if ($request->ajax()){
            $view = view('sub.post',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('front.index' ,compact('posts'));
    }

    /**
     * Show the application Homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function trending(Request $request)
    {
        $posts = Post::where('status',1)->orderByDesc(
            View::selectRaw('count(post_id) as total')
            ->whereColumn('post_id', 'posts.id')
            ->orderByDesc('total')
            ->limit(1)
        )->orderByDesc('created_at')->simplePaginate(20);
        
        if ($request->ajax()){
            $view = view('sub.post',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('front.index' ,compact('posts'));
    }
    /**
     * Show the Search Results.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:3'
        ]);

        $search = $request->search;

        $posts = Post::where('status',1)->where('title','like',"%$search%")->orwhere('content','like',"%$search%")->orderByDesc('created_at')->simplePaginate(20);
        if ($request->ajax()){
            $view = view('sub.post',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('front.post.search' ,compact('posts', 'search'));
    }

    // Chage user Language
    public function change_language($code)
    {
        Session::put('locale', $code);
        return redirect()->back();
    }
    // Logout Function
    public function logout() {
        auth()->logout();
        return redirect('/');
    }

    /**
     * Show the Custom Pages.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pages($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page == null) {
            abort(404);
        }
        return view('front.page', compact('page'));
    }
    
    /**
     * Send Anonymous Message.
     *
     * @return \App\Models\User
     */
    public function send_message($username)
    {
        $user = User::where('username', $username)->first();
        if ($user == null) {
            abort(404);
        }
        return view('front.message.send', compact('user'));
    }
    /**
     * store Anonymous Message.
     *
     * @return \App\Models\User
     * @return \Request
     */
    public function store_message($username, Request $request)
    {
        $user = User::where('username', $username)->first();
        if ($user == null) {
            return redirect()->back()->withError(__('Something Went Wrong.'));
        }
        // Validate requests
        $request->validate([
            'message' => 'required|string|max:'.sys_setting('max_message'),
            'sender_id' => 'nullable|string'
        ]);
        // Save message if message is enabled
        if (sys_setting('is_message') == 1) {
            $message = new Message();
            $message->user_id = $user->id;
            $message->message = $request->message;
            $message->sender_id = $request->sender_id;
            $message->ip = $request->ip();
            $message->save();
            // redirect to message sent page


            return redirect()->route('sent.message')->withSuccess(__('Message sent successfully.'));
        }else{
            return redirect()->route('index')->withError(__('Messages has been disabled.'));
        }
        
    }

    public function sent_message ()
    {
        return view('front.message.sent');
    } 
    
    /**
     * Show maintenancepage.
     *
     * @return App\Models\Setting
     */
    public function maintenance()
    {
        return view('front.maintenance');
    }

}
