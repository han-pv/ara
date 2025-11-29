<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);

        $objs = [];
        foreach ($posts as $post) {
            $objs[] = [
                'id' => $post->id,
                'user_id' => $post->user_id,
                'content' => $post->content,
                'image_path' => $post->image_path,
                'video_path' => $post->video_path,
                'view_count' => $post->view_count,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at
            ];
        }
        return response()->json([
            'status' => 1,
            'data' => $objs,
            'current_page' => $posts->currentPage(),
            'per_page' => $posts->perPage(),
            'total' => $posts->total(),
        ], 200);
    }
}
