<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('likes')
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('admin.posts.index')->with([
            'posts' => $posts
        ]);
    }

    public function destroy($postId)
    {
        $post = Post::where('id', $postId)->firstOrFail();

        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return to_route('admin.posts.index')->with([
            'success' => 'Post deleted successfully.'
        ]);
    }
}
