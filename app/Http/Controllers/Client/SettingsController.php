<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        return view('client.settings.index');
    }
}
