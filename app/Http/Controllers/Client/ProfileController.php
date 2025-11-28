<?php

namespace App\Http\Controllers\Client;

use App\Models\Post;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = User::where('id', Auth::id())
            ->withCount('posts', 'followers', 'following')
            ->first();

        $myProfile = Profile::where('user_id', $user->id)->first();

        $myPosts = Post::where('user_id', $user->id)
        ->withCount('likes')
        ->get();


        return view('client.profile.show')->with([
            'user' => $user,
            'profile' => $myProfile,
            'myPosts' => $myPosts,
        ]);
    }

    public function edit()
    {
        $profile = Profile::where('user_id', Auth::id())->firstOrFail();
        $user = Auth::user();

        return view('client.profile.edit')->with([
            'profile' => $profile,
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['string', 'min:3'],
            'surname' => ['nullable', 'string', 'min:3'],
            'username' => ['string', 'min:3', Rule::unique('users')->ignore(Auth::id())],
            'text' => ['nullable', 'string'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $avatar = $request->file('image')->store('users', 'public');
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->username = $request->username;
        $user->save();

        $profile = Profile::where('user_id', Auth::id())->firstOrFail();
        $profile->bio = $request->text ?? $profile->bio;
        $profile->avatar = $avatar ?? $profile->avatar;
        $profile->save();

        return to_route('profile.show')->with([
            'success' => trans('app.profileUpdated')
        ]);
    }
}
