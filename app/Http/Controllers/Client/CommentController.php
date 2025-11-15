<?php

namespace App\Http\Controllers\Client;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'parentId' => ["nullable", "integer", "min:1"],
            'text' => ["nullable", "string", "min:1"],
        ]);

        $userId = Auth::id();
        $post = Post::where('id', $postId)->first();

        Comment::create([
            'user_id' => $userId,
            'post_id' => $post->id,
            'parent_id' => $request->parentId ? $request->parentId : null,
            'comment' => $request->text
        ]);

        return redirect()->back()->with([
            "success" => "Comment yazyldy"
        ]);
    }

    public function destroy($commentId)
    {
        //
    }
}
