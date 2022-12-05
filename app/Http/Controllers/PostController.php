<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    //
    public function index(){
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->where('isLive', 1)->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post){
        $admin = request()->user()->isAdmin ?? 0;
        if($post->isLive || $admin){

            return view('posts.show', [
                'post' => $post
            ]);
        }
        else 
        return redirect('/');

    }

}
