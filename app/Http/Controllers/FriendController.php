<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Chatroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function friendList(){

        $user = Auth::user();
        $friends = Chatroom::where('user_id_1', $user->id)->get();
        $friends1 = Chatroom::where('user_id_2', $user->id)->get();
        
        $unreadCounts = [];

        foreach ($friends as $friend) {
            // dd($friend->user2->id);
            $unreadCount = Chat::where('chatroom_id', $friend->id)
                ->where('user_id', $friend->user2->id)
                ->where('read', false)
                ->count();
                // dd($unreadCount);
            $unreadCounts[$friend->id] = $unreadCount;
        }

        foreach ($friends1 as $friend) {
            $unreadCount = Chat::where('chatroom_id', $friend->id)
                ->where('user_id', $friend->user1->id)
                ->where('read', false)
                ->count();
                // dd($unreadCount);
            $unreadCounts[$friend->id] = $unreadCount;
        }

        

        return view('user.friend', compact('friends', 'friends1', 'unreadCounts'));
    }
}
