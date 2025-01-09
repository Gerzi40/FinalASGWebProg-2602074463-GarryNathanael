<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\FriendController;


use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WishlistController;
 
Route::post('/greeting', function (Request $req) {

    $lang = $req->locale;

    session(['key' => $lang]);

    return redirect()->back();

})->name('localization');

Route::get('/', [GuestController::class, 'guestHome'])->name('guest.home');

Route::controller(AuthController::class)->group(function(){
    Route::get('/register', 'showRegistForm')->name('register.form');
    Route::post('/register', 'store')->name('register.store');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'attempLogin')->name('attemplogin');
});
Route::controller(PaymentController::class)->group(function(){
    Route::get('/registPayment', 'registPayment')->name('regist.payment');
    Route::post('/registPayment', 'registPay')->name('regist.pay');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/user/home', [UserController::class, 'index'])->name('user.home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(WishlistController::class)->group(function(){
        Route::get('/user/wishlist/{id}', 'sendFriendRequest')->name('user.sendFriendRequest');
        Route::get('/user/wishlist', 'showRequest')->name('user.showRequest');
        Route::get('/user/wishlist/accept/{id}', 'acceptRequest')->name('user.acceptRequest');
        Route::get('/user/wishlist/reject/{id}', 'rejectRequest')->name('user.rejectRequest');
        Route::get('/user/wishlist/delete/{id}', 'deleteRequest')->name('user.deleteRequest');
    });
    Route::controller(PaymentController::class)->group(function(){
        Route::get('/user/shop', 'showShop')->name('user.showShop');
        Route::get('/user/shop/topup', 'topUp')->name('user.topUp');
    });
    Route::controller(FriendController::class)->group(function(){
        Route::get('/user/friends', 'friendList')->name('user.friendList');
    });
    Route::controller(ChatController::class)->group(function(){
        Route::get('/user/chat/{id}', 'showChatBox')->name('user.showChatBox');
        Route::post('/user/sendmessage', 'sendMessage')->name('user.sendMessage');
    });
});
