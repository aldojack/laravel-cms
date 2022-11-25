<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Services\Newsletter;



Route::get('/', [PostController::class,  'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments',[PostCommentsController::class,'store']);
Route::post('newsletter',NewsletterController::class);


Route::middleware('guest')->group(function(){
    Route::get('register',[RegisterController::class, 'showRegistrationForm'])->middleware('guest');
    Route::post('register',[RegisterController::class, 'register'])->middleware('guest');
    Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
    Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
    Route::get('login/{provider}',[LoginController::class,'redirectToProvider']);
    Route::get('login/{provider}/callback',[LoginController::class,'handleProviderCallback']);
});

Route::middleware('can:admin')->group(function(){
    Route::resource('admin/posts', AdminPostController::class)->except('show');
    Route::resource('admin/users', AdminUserController::class);
    Route::delete('admin/users/{user}', [AdminUserController::class, 'destroy']);
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');




Route::get('email-verification',[RegisterController::class, 'awaitingVerification'])->name('email-verification');
Route::get('email-verification/error', [RegisterController::class, 'getVerificationError'])->name('email-verification.error');
Route::get('email-verification/check/{token}', [RegisterController::class, 'getVerification'])->name('email-verification.check');

Route::group(['middleware' => ['isVerified', 'auth']], function () {
    
    Route::get('dashboard/posts', [UserPostController::class, 'index']);
    Route::post('dashboard/posts', [UserPostController::class, 'store']);
    Route::get('dashboard/posts/create', [UserPostController::class, 'create']);
    Route::get('dashboard/posts/{post}/edit', [UserPostController::class, 'edit']);
    Route::patch('dashboard/posts/{post}', [UserPostController::class, 'update']);
    Route::delete('dashboard/posts/{post}', [UserPostController::class, 'destroy']);

});










