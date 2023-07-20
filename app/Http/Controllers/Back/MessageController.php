<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    //
    public function index()
    {
       $messages = Message::orderByDesc('id')->get();
       return view('back.messages.index', compact('messages'));
    }

    public function delete($id)
    {
        $message = Message::find($id);
        $message->delete();

       return redirect()->route('messages.index')->withSuccess('Message Deleted Successfully');
    }
}
