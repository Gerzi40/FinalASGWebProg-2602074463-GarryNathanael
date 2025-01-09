<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $req){

        $request = $req->query('search');
        $interest = $req->query('interests');
        // $gender = $req->query('gender');

        $user = Auth::user();

        // $query = User::query();

        // $query->where('id', '!=', $user->id);
        // $users = User::where('id', '!=', $user->id)->where('gender', $request)->get();

        // if($gender){
        //     $query->where('gender', $gender);
        // }
        // if($request){
        //     $query->where('name', 'like', '%' . $request . '%');
        // }

        // $users = $query->get();

        $users = User::where('id', '!=', $user->id)->where('gender', 'LIKE', "%".$request."%")->where('interests', 'LIKE', "%".$interest."%")->get();
        $user1 = Wishlist::where('user_id_1', $user->id)->pluck('user_id_2')->toArray();
        $user2 = Wishlist::where('user_id_2', $user->id)->pluck('user_id_1')->toArray();

        $userAdded = array_merge($user1, $user2);

        return view('user.home', compact('users', 'userAdded'));
    }
}
