<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function index (){
        $users = User::all();
        return view('back.user.index', compact('users'));
    }
    function edit ($id){
        $user = User::findorFail($id);
        return view('back.user.edit', compact('user'));
    }

    function update (Request $request, $id){
        $user = User::findorFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        if($request->role != null){
            $user->user_role = $request->role;        
        }
        if($request->password != null){
            $user->password = Hash::make($request->password);        
        }
        $user->save();
        return redirect()->route('users.index')->withSuccess(__('User Updated Successfully.'));
    }

    public function delete($id)
    {
        $user = User::findorFail($id);
        // Delete all posts comments and messages
        $posts = $user->posts()->delete();
        $comments = $user->comment()->delete();
        $messages = $user->messages()->delete();
        $user->delete();
        return redirect()->back()->withSuccess(__('User Deleted Successfully.'));
    }

}
