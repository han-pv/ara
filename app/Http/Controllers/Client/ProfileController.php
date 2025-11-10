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
            'user' => $user,
            'profile' => $myProfile,
            'myPosts' => $myPosts,
        ]);
    }

    public function edit($id)
    {
        $user = Profile::where('user_id', $id)->firstOrFail();

        return view('client.profile.edit')->with([
            'user' => $user
        ]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'text' => ['nullable', 'string'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $avatar = $request->file('image')->store('users', 'public');
        }

        $user = Profile::where('user_id', $id)->firstOrFail();
        $user->bio = $request->text ?? $user->bio ;
        $user->avatar = $avatar ?? $user->avatar ;
        $user->save();

        return to_route('profile.show')->with([
            'success' => 'Profiliniz ustunlikli uytgedildi'
        ]);
    }
}
