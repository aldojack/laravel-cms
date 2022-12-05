<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Services\Newsletter;
use App\Models\Post;
use App\Models\User;



Route::get('/', [PostController::class,  'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments',[PostCommentsController::class,'store']);
Route::post('newsletter',NewsletterController::class);


Route::middleware('guest')->group(function(){
    Route::get('register',[RegisterController::class, 'showRegistrationForm'])->middleware('guest');
    Route::post('register',[RegisterController::class, 'register'])->middleware('guest');
    Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
    Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
    //Socialite route
    Route::get('login/{provider}',[LoginController::class,'redirectToProvider']);
    Route::get('login/{provider}/callback',[LoginController::class,'handleProviderCallback']);
});

Route::middleware('can:admin')->group(function(){
    Route::resource('admin/posts', AdminPostController::class)->except('show');
    Route::resource('admin/users', AdminUserController::class)->except('create', 'store', 'show', 'edit', 'update');
    Route::delete('admin/users/{user}', [AdminUserController::class, 'destroy']);

    //API Routes
    Route::get('admin/api/posts', function(){
        return Post::with('author')->get();
    });

    Route::get('admin/api/posts/{post}', function(Post $post){
        return Post::where('id',$post->id)->first();
    });

    Route::get('admin/api/users', function(){
        return User::all();
    });

    Route::get('admin/api/users/{user}', function(User $user){
        return User::where('id',$user->id)->first();
    });
});

Route::group(['middleware' => ['isVerified', 'auth']], function () {
    Route::resource('dashboard/posts', UserPostController::class)->except('show');
});

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('email-verification',[RegisterController::class, 'awaitingVerification'])->name('email-verification');
Route::get('email-verification/error', [RegisterController::class, 'getVerificationError'])->name('email-verification.error');
Route::get('email-verification/check/{token}', [RegisterController::class, 'getVerification'])->name('email-verification.check');












