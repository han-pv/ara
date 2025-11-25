<?php

namespace App\Http\Controllers\Client;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($postId)
    {
        $liked = false;
        $user = Auth::user();
        $like = Like::where('post_id', $postId)
            ->where('user_id', $user->id)
            ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => $user->id,
                'post_id' => $postId
            ]);
            $liked = true;
        }
        
        // if ($liked) {

        //     return redirect()->back()->with([
        //         'success' => 'Like added',
        //     ]);
        // }
        // return redirect()->back()->with([
        //     'error' => 'Like removed',
        // ]);

        return response()->json([
            'liked' => $liked,
            'message' => $liked ? 'Like added' : 'Like removed',
        ]);
    }
}
