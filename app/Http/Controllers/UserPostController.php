<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserPostController extends Controller
{
    public function index()
    {
        return view('user.posts.index', [
            'posts' => Post::where('user_id', auth()->id())
            ->get()
        ]);
    }
    

    public function create()
    {
        return view('user.posts.create');
    }

    public function store()
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('/images/thumbnails')
        ]));

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('user.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {

            $path = $post->thumbnail;

            if(Storage::disk('public')->exists($path))
            {
                Storage::disk('public')->delete($path);
            }

            $attributes['thumbnail'] = request()->file('thumbnail')->store('/images/thumbnails');
        }

        $post->update($attributes);

        return redirect('/')->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $path = $post->thumbnail;

        if(Storage::disk('public')->exists($path))
        {
            Storage::disk('public')->delete($path);
        }

        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }

    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}