<?php

namespace App\Http\Controllers\Client;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('id', 'desc')
            ->take(10)
            ->get();

        return view('client.posts.index')->with([
            'posts' => $posts,
        ]);

    }

    public function show($id) {

        $post = Post::where('id', $id)->firstOrFail();

        return view('client.posts.show')->with([
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('client.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => ['required', 'string'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:2048'],
        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images/post-images', 'public');
        }

        Post::create([
            'user_id' => 1,
            'content' => $request->content,
            'image_path' => $imagePath ? $imagePath : null,
            'view_count' => 0,
        ]);

        return to_route('posts.index')->with([
            'success' => 'Postunyz ustunlikli doredildi'
        ]);
    }

    public function destroy($id) {
        $post = Post::where('id', $id)->firstOrFail();

        if($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return to_route('posts.index')->with([
            'success' => "Post ustunlikli pozludy"
        ]);
    }
}
