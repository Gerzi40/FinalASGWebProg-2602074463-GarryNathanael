<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function registPayment(Request $request){
        $registfee = $request->query('registfee');
        $userId = $request->query('userId');
        $overpaidAmount = 0;
        return view('auth.payment', compact('registfee', 'userId', 'overpaidAmount'));
    }

    public function registPay(Request $request){
        
        //dd($request->all());
        if ($request->has('confirmation')) {
            // dd('test');
            $currUser = User::findorfail($request->userId);
    
            if ($request->confirmation === 'yes') {
                $currUser->wallet = $request->overpaidAmount;
                $currUser->coin_wallet = $request->overpaidAmount + 100;
            } else {
                $registfee = $request->fee;
                $userId = $request->userId;
                $overpaidAmount = 0;
                return view('auth.payment', compact('registfee', 'userId', 'overpaidAmount'));
            }
            
            $currUser->save();
    
            return redirect()->route('login')->with('success', 'Payment processed successfully!');
        }

        $request->validate([
            'number' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value < $request->fee) {
                        $fail('The number inputted must be the same as the fee or bigger!');
                    }
                },
            ],
        ], [
            'number.required' => 'Number is required!',
            'number.numeric' => 'Input must be numeric!',
        ]);

        if($request->number > $request->fee){
            $registfee = $request->fee;
            $userId = $request->userId;
            $overpaidAmount = $request->number - $request->fee;
            return view('auth.payment', compact('registfee', 'userId', 'overpaidAmount'));
        }

        return redirect()->route('login')->with('success', 'Data successfully regristered!');
    }

    public function showShop(){
        $user = Auth::user();
        return view('user.shop', compact('user'));
    }

    public function topUp(){
        $user = Auth::user();

        $currUser = User::findorfail($user->id);
        $currUser->coin_wallet += 100;
        $currUser->save();

        return redirect()->route('user.showShop', compact('currUser'))->with('success', 'Top Up success!');
    }
}
