<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Services\Newsletter;




Route::get('/', [PostController::class,  'index'])->name('home');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments',[PostCommentsController::class,'store']);

Route::post('newsletter',NewsletterController::class);

Route::get('register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('register',[RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::middleware('can:admin')->group(function(){
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});

Route::get('dashboard/posts', [UserPostController::class, 'index'])->middleware('auth');
Route::post('dashboard/posts', [UserPostController::class, 'store'])->middleware('auth');
Route::get('dashboard/posts/create', [UserPostController::class, 'create'])->middleware('auth');
Route::get('dashboard/posts/{post}/edit', [UserPostController::class, 'edit'])->middleware('auth');
Route::patch('dashboard/posts/{post}', [UserPostController::class, 'update'])->middleware('auth');
Route::delete('dashboard/posts/{post}', [UserPostController::class, 'destroy'])->middleware('auth');







