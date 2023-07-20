<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Str;
class PostController extends Controller
{
    //Confessions
    public function index()
    {
       $confessions = Post::orderByDesc('id')->get();
       return view('back.confession.index', compact('confessions'));
    }
    
    public function edit_confession($id)
    {
        $categories = Category::where('status', 1)->orderByDesc('id')->get();
        $confession = Post::find($id);
        return view('back.confession.edit', compact('confession','categories'));
    }
    public function update_confession(Request $request, $id)
    {
        $confession = Post::find($id);
        $confession->category_id = $request->category_id;
        $confession->title = $request->title;
        $confession->content = $request->content;
        $confession->status = $request->status;
        $confession->save();
        return redirect()->route('confessions.index')->withSuccess(__("Post Updated Successfully"));
        # code...
    }
    public function update_status ($id, $status){
        $confession = Post::find($id)->update(['status' => $status]);
        return back()->withSuccess(__("Post Updated Successfully"));
    }    
    public function delete($id)
    {
        $confession = Post::find($id);
        // delete Comments
        $confession->comments()->delete();
        
        $confession->delete();
       return redirect()->route('confessions.index')->withSuccess('Post Deleted Successfully');
    }

    public function settings()
    {
       return view('back.confession.settings');
    }

    
    // Categories
    public function categories()
    {
       $categories = Category::where('status', 1)->orderByDesc('id')->get();
       return view('back.category.index', compact('categories'));
    }
    public function create_category(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->about = $request->about;
        $category->slug = Str::slug($request->name);
        $category->save();

        return back()->withSuccess(__("Category created successfully"));
    }
    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('back.category.edit', compact('category'));
    }
    public function update_category(Request $request ,$id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->about = $request->about;
        $category->slug = Str::slug($request->name);
        $category->save();

        return redirect()->route('category.index')->withSuccess(__("Category updated successfully"));
    }    
    public function delete_category($id)
    {
        $category = Category::find($id)->update(['status' => 2]);
        return back()->withSuccess(__("Category deleted successfully"));
    }

    // Comments
    public function comments()
    {
       $comments = Comment::orderByDesc('id')->get();
       return view('back.comments.index', compact('comments'));
    }
    public function edit_comment($id)
    {
        $comment = Comment::find($id);
        return view('back.comments.edit', compact('comment'));
    }
    public function update_comment($id)
    {
        $category = Category::find($id);
        return view('back.category.edit', compact('category'));
    }
    public function delete_comment($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

       return redirect()->route('comments.index')->withSuccess('Comment Deleted Successfully');
    }
    public function comment_status($id, $status){
        $comment = Comment::find($id)->update(['status' => $status]);
        return back()->withSuccess(__("Comment Updated Successfully"));
    }
}
