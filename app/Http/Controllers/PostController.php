<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\View;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if (sys_setting('guest_post') == 1) {            
            $categories = Category::where('status', 1)->get();
            return view('front.post.create', compact('categories'));
        }else{
            if(Auth::check()) {
                $categories = Category::where('status', 1)->get();
                return view('front.post.create', compact('categories'));
            }else{
                // probably show a modal
                return redirect()->route('login')->withError(__('Please Login to make confession'));
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate requests
        $request->validate([
            'title' => 'required|string|max:'.sys_setting('max_post_title'),
            'content' => 'required|string|min:'.sys_setting('minimum_post').'|max:'.sys_setting('max_post'),
            'category_id' => 'required',
            'user_id' => 'nullable'
        ]);
        // Check if new posts is accepted
        if (sys_setting('publish_posts') == 1) {
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category_id;
            $post->user_id = $request->user_id;
            if (sys_setting('approve_posts') == 1) {           
                $post->status = 2;
            }else{
                $post->status = 1;
            }
            $post->slug = createSlug($request->title, 'posts');

            $post->save();
            if(Auth::check()) {
                return redirect()->route('user.posts')->withSuccess(__('Confession posted successfully.'));
            }else{
                return redirect()->route('index')->withSuccess(__('Confession posted successfully.'));
            }
           
        }else{
            // probably show a modal
            return redirect()->route('index')->withError(__('New posts have been disabled.'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post == null) {
            abort(404);
        }
        if ($post->status != 1) {
            abort(404);
        }
        // Add post views
        View::createViewLog($post);

        $comments = Comment::where('status', 1)->where('post_id', $post->id)->orderByDesc('created_at')->get();
        return view('front.post.view', compact('post','comments'));
    }

    /**
     * Show the form for Reporting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store_comment(Request $request)
    {
        
        // Validate requests
        $request->validate([
            'comment' => 'required|string|min:'.sys_setting('minimum_comment').'|max:'.sys_setting('max_comment'),
            'post_id' => 'required',
            'user_id' => 'nullable'
        ]);
        //redirect is guest comment is disabled
        if (sys_setting('guest_comment') == 1) {            
            if (sys_setting('publish_comments') == 1) {
                $comment = new Comment();
                $comment->user_id = $request->user_id;
                $comment->post_id = $request->post_id;
                $comment->comment = $request->comment;
                if (sys_setting('approve_comments') == 1) {           
                    $comment->status = 2;
                }else{
                    $comment->status = 1;
                }
                $comment->save();
                return redirect()->back()->withSuccess(__('Comment posted successfully.'));
            }else{
                // probably show a modal
                return redirect()->back()->withError(__('Comment have been disabled.'));
            }
        }else{
            if(Auth::check()) {
                //make comment
                if (sys_setting('publish_comments') == 1) {
                    $comment = new Comment();
                    $comment->user_id = $request->user_id;
                    $comment->post_id = $request->post_id;
                    $comment->comment = $request->comment;
                    if (sys_setting('approve_comments') == 1) {           
                        $comment->status = 2;
                    }else{
                        $comment->status = 1;
                    }
                    $comment->save();
                    return redirect()->back()->withSuccess(__('Comment posted successfully.'));
                }else{
                    // probably show a modal
                    return redirect()->back()->withError(__('Comment have been disabled.'));
                }
            }else{
                // probably show a modal
                return redirect()->route('login')->withError(__('Please Login to post comment'));
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Post::find($id);
        if (Auth::id() == $post->user) {
            $comments =$post->comments()->delete();
            $post->delete();
            return redirect()->route('user.dashboard')->withSuccess(__('Confession deleted successfully.'));
        }
        return redirect()->route('user.dashboard')->withError(__('Something went wrong.'));
    }

    /**
     * Display the specified category.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function view_category($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->where('status',1)->first();
        if ($category == null) {
            abort(404);
        }
        $posts = Post::where('status',1)->where('category_id', $category->id)->orderByDesc('created_at')->simplePaginate(20);
        if ($request->ajax()){
            $view = view('sub.post',compact('posts'))->render();
            return response()->json(['html'=>$view]);
        }

        return view('front.post.category', compact('category', 'posts'));
    }

}
