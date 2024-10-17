<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Mail\DiscountOffer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Providers\AuthServiceProvider;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});


Route::resource('posts', PostController::class);

Route::post('/posts/{post}/comments', [CommentsController::class, 'store']);

Route::get('/singup/{lang}', function($lang){
    App::setLocale($lang);
    return view('singup');
});



Route::post('/mail', function(){

   $email = request()->validate([
        'email' => 'required|email',
    ]);
  
    Mail::to($email)->send(new DiscountOffer());
    return back();

  });

  



  
  $oneTimeToken = '145'; // احصل على الرمز المميز من الطريقة الخاصة بك
  return view('welcome', compact('oneTimeToken'));
   






