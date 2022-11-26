<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

    public function destroy(User $user)
    {
            if($user->isAdmin === 0)
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

            else 
            {
            return back()->with('error', 'Unable to delete admin accounts');
            }
    }
}