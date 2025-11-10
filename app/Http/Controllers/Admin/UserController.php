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

    public function block($userId) {

        $user = User::where('id', $userId)->first();
        $user->is_blocked = 1; //true
        $user->save();  

        return redirect()->back()->with([
            'success' => 'User üstünlikli blok edildi'
        ]);
    }
}
