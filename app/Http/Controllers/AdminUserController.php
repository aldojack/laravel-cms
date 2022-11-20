<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
 

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::paginate(50)
        ]);
    }

    // public function create()
    // {
    //     return view('admin.users.create');
    // }

    // public function store()
    // {
    //     Post::create(array_merge($this->validatePost(), [
    //         'user_id' => request()->user()->id,
    //         'thumbnail' => request()->file('thumbnail')->store('/images/thumbnails')
    //     ]));

    //     return redirect('/');
    // }

    // public function edit(User $user)
    // {
    //     return view('admin.users.edit', ['user' => $user]);
    // }

    // public function update(User $user)
    // {
    //     $attributes = $this->validatePost($user);

    //     if ($attributes['thumbnail'] ?? false) {
    //         $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
    //     }

    //     $post->update($attributes);

    //     return back()->with('success', 'Post Updated!');
    // }

    public function destroy(User $user)
    {

        $user->posts->each(function ($post) {
            if(Storage::disk('public')->exists($post->thumbnail))
            {
                Storage::disk('public')->delete($post->thumbnail);
                $post->delete();
            }
        });
        
        $user->delete();

        return back()->with('success', 'User Deleted!');
    }


    // protected function validatePost(?Post $post = null): array
    // {
    //     $post ??= new Post();

    //     return request()->validate([
    //         'title' => 'required',
    //         'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
    //         'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
    //         'excerpt' => 'required',
    //         'body' => 'required',
    //         'category_id' => ['required', Rule::exists('categories', 'id')]
    //     ]);
    // }
}