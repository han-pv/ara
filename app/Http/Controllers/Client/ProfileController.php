<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::where('id', Auth::user()->id)
            ->withCount('posts', 'followers', 'following')
            ->first();

        $myProfile = Profile::where('user_id', $user->id)->first();

        $myPosts = Post::where('user_id', $user->id)->get();


        return view('client.profile.show')->with([
            'user' => $user, 'profile' => $myProfile, 'myPosts' => $myPosts,
        ]);
    }
}
