<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount('posts')
            ->paginate(15)
            ->withQueryString();

        return view('admin.users.index')->with([
            'users' => $users
        ]);
    }

    public function block($userId)
    {
        $user = User::where('id', $userId)->first();

        if ($user->is_blocked) {
            $user->is_blocked = 0; //false
        } else {
            $user->is_blocked = 1; //true
        }
        $user->save();

        return redirect()->back()->with([
            'success' =>  $user->is_blocked ? 'User üstünlikli blok edildi' : 'User üstünlikli blokdan açyldy'
        ]);
    }
}
