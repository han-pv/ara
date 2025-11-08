<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $posts_count = [];
        $dates = [];

        for ($i = 9; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $posts = Post::whereDate('created_at', $date)->count();
            $posts_count[] = $posts;
            $dates[] = $date;
        }

        return view('admin.dashboard.index')->with([
            'posts_count' => $posts_count,
            'dates' => $dates,
        ]);
    }
}
