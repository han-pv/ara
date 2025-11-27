<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return response()->json([
            ['id' => 1, 'title' => 'First Post', 'content' => 'This is the content of the first post.'],
            ['id' => 2, 'title' => 'Second Post', 'content' => 'This is the content of the second post.'],
        ]);
    }
}
