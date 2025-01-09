<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function showChatBox($id){
        $user = Auth::user();
        
        $chats = Chat::where('chatroom_id', $id)->get();

        $chatsNotUser = Chat::where('chatroom_id', $id)->where('user_id', '!=' , $user->id)->get();
        // dd($chatsNotUser);

        foreach($chatsNotUser as $chat){
            $chat->read = true;
            $chat->save();
        }

        // dd($chats);
        $chatroom_id = $id;
        
        return view('user.chat', compact('chats', 'user', 'chatroom_id'));
    }

    public function sendMessage(Request $request){
        $request->validate(['message' => 'required']);
        $user = Auth::user();

        Chat::create([
            'chatroom_id' => $request->chatroom_id,
            'user_id' => $user->id,
            'message' => $request->message
        ]);

        return redirect()->route('user.showChatBox', ['id' => $request->chatroom_id]);

    }
}
