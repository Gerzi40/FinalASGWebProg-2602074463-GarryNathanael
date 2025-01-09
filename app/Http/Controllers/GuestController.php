<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function guestHome(){
        $users = User::all();
        return view('guest.home', compact('users'));
    }
}
