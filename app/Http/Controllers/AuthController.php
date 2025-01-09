<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistForm(){

        if (!session()->has('registprice')) {
            session(['registprice' => mt_rand(100000, 125000)]);
        }

        $registprice = session('registprice');

        return view('auth.register', compact('registprice'));
    }

    public function store(Request $req){

        $validated = $req->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'gender' => 'required|in:male,female',
            'username' => ['required', 'regex:/^https:\/\/(www\.)?linkedin\.com\/in\/[a-zA-Z0-9_-]+$/'],
            'interests' => ['required', 'string', function ($attribute, $value, $fail) {
                $fieldsOfWork = array_map('trim', explode(',', $value)); // Split and trim the values
                if (count($fieldsOfWork) < 3) {
                    $fail('Please specify at least 3 fields of work.');
                }
            }],
            'mobilenumber' => 'required|regex:/^\d+$/',
            'age' => 'required|numeric|min:18',
            'registprice' => 'required'
        ],
        [
            'name.required' => 'Username is required!',
            'name.min' => 'Username min 5 char!',
            'username.required' => 'Linkedin Username is required!',
            'username.regex' => 'Linkedin Username must be https://www.linkedin.com/in/<username>',
            'email.required' => 'Email is required!',
            'email.email' => 'Input must be an email format!',
            'email.unique' => 'Email must be unique!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 5 character!',
            'gender.required' => 'Gender must be selected!',
            'gender.in' => 'The selected gender is invalid!',
            'interests.required' => 'The interests is required!',
            'mobilenumber.required' => 'The mobil enumber is required!',
            'mobilenumber.regex' => 'The mobile number must be a digit',
            'age.required' => 'The age is required!',
            'age.numeric' => 'The age must be a valid number!',
            'age.min' => 'The minimum age is 18!',
        ]);

        // $fieldsOfWork = array_map('trim', explode(',', $req->input('interests')));

        // dd($req->gender);

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'gender' => $req->gender,
            'interests' => array_map('trim', explode(',', $req->input('interests'))),
            'linkedin_username' => $req->username,
            'phone_number' => $req->mobilenumber,
            'age' => $req->age,
            'registfee'=> $req->registprice,
        ]);

        session()->forget('registprice');

        return redirect()->route('regist.payment', ['registfee' => $req->registprice, 'userId' => $user->id]);
    }


    public function showLoginForm(){
        return view('auth.login');
    }

    public function attempLogin(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ],[
            'email.required' => 'Email is required!',
            'email.email' => 'Input must be an email format!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 5 character!',
        ]);

        $userData = User::where('email', $credentials['email'])->first();
        if(!$userData){
            return back()->withErrors(['error' => 'Email not found!']);
        }
        else{
            if($userData && !Hash::check($credentials['password'], $userData['password'])){
                return back()->withErrors(['error' => 'Wrong Password']);
            }
            Auth::login($userData);
            return redirect()->route('user.home');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('guest.home');
    }
}
