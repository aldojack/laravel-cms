<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;


Route::post('newsletter', function(){
    request()->validate(['email' => 'required|email']);
    $mailchimp = new ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us12'
    ]);
    try{
        $response = $mailchimp->lists->addListMember('a06547c296', [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    } catch(\Exception $e){
        throw ValidationException::withMessages([
            'email' => 'Invalid email, could not be added to our newsletter list.'
        ]);
    };
    return redirect('/')->with('success','You are signed up to our newsletter');
});

Route::get('/', [PostController::class,  'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments',[PostCommentsController::class,'store']);

Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

