<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    { 
        return view('client.auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string', "min:3"],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('posts.index')->with([
                'success' => trans('app.loginSuccess')
            ]);
        }

        return back()->withErrors([
            'username' => trans('app.loginError'),
        ])->onlyInput('username');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with([
                'success' => trans('app.logoutSuccess'),
            ]);
    }
}
