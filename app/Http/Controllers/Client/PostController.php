<?php

namespace App\Http\Controllers\Client;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('likes', 'comments')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('client.posts.index')->with([
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::where('id', $id)
            ->withCount('likes', 'comments')
            ->firstOrFail();

        $comments = Comment::where('post_id', $id)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('client.posts.show')->with([
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    public function create()
    {
        return view('client.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => ['required', 'string'],
            'image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/post-images', 'public');
        }

        $user = Auth::user()->id;

        Post::create([
            'user_id' => $user,
            'content' => $request->text,
            'image_path' => isset($imagePath) ? $imagePath : null,
            'view_count' => 0,
        ]);

        // $post = new Post();
        // $post->user_id = $user;
        // $post->content = $request->text;
        // $post->image_path = $imagePath ? $imagePath : null;
        // $post->save();

        return to_route('posts.index')->with([
            'success' => trans('app.postCreated')
        ]);
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        return view('client.posts.edit')->with([
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => ['required', 'string'],
        ]);

        $post = Post::where('id', $id)->firstOrFail();
        $post->content = $request->text;
        $post->save();

        return to_route('profile.show')->with([
            'success' => trans('app.postUpdated')
        ]);
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }

        $post->delete();

        return redirect()->back()->with([
            'success' => trans('app.postDeleted')
        ]);
    }
}
