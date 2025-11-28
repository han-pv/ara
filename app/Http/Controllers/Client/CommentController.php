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
            'commentId' => ["nullable", "integer", "min:1"],
            'text' => ["nullable", "string", "min:1"],
        ]);

        $userId = Auth::id();
        $post = Post::where('id', $postId)->first();

        Comment::create([
            'user_id' => $userId,
            'post_id' => $post->id,
            'parent_id' => $request->commentId ? $request->commentId : null,
            'comment' => $request->text
        ]);

        return redirect()->back()->with([
            "success" => trans('app.commentAdded')
        ]);
    }

    public function destroy($commentId)
    {
        $comment = Comment::where('id', $commentId)->firstOrFail();
        $comment->delete();

        return redirect()->back()->with([
            "success" => trans('app.commentDeleted')
        ]);
    }
}
