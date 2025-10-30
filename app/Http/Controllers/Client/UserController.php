<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function index()
    {

        $users = User::whereNot('id', Auth::id())->get();
        
        return view('client.users.index')->with(
            [
                'users' => $users
            ]
        );
    }
}
