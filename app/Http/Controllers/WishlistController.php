<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //
    public function sendFriendRequest($id){
        $currUser = Auth::user();
        $intendedUser = User::findorfail($id);

        $wishlist = Wishlist::create([
            'user_id_1' => $currUser->id,
            'user_id_2' => $intendedUser->id,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Friend request sent!');
    }

    public function showRequest(){
        $sentRequests = Wishlist::where('user_id_1', Auth::user()->id)->where('status', 'pending')->get();
        $receivedRequests = Wishlist::where('user_id_2', Auth::user()->id)->where('status', 'pending')->get();
        return view('user.wishlist', compact('sentRequests', 'receivedRequests'));
    }

    public function acceptRequest($id){
        $currUser = Auth::user();
        $wishlist = Wishlist::where('user_id_1', $id)->where('user_id_2', $currUser->id)->first();
        // dd($wishlist);
        $wishlist->status = 'accepted';
        $wishlist->save();

        Chatroom::create([
            'user_id_1' => $currUser->id,
            'user_id_2' => $id,
        ]);
        
        return redirect()->route('user.showRequest')->with('success', 'Request Accepted!');
    }

    public function rejectRequest($id){
        $currUser = Auth::user();
        $wishlist = Wishlist::where('user_id_1', $id)->where('user_id_2', $currUser->id)->first();
        $wishlist->status = 'rejected';
        $wishlist->save();
        return redirect()->route('user.showRequest')->with('success', 'Request Rejected!');
    }

    public function deleteRequest($id){
        $currUser = Auth::user();
        $wishlist = Wishlist::where('user_id_1', $currUser->id)->where('user_id_2', $id)->first();
        $wishlist->delete();
        return redirect()->route('user.showRequest')->with('success', 'Request Deleted!');
    }
}
