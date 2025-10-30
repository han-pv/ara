<?php

namespace App\Http\Controllers\Client;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function toggle($userId)
    {

        $followed = false;
        $me = Auth::user()->id;

        if ($me == $userId) {
            return redirect()->back()->with([
                'error' => "Oz ozuni follow edip bolanok"
            ]);
        }

        $isFollow = Follow::where('following_id', $me)
            ->where('follower_id', $userId)
            ->first();

        if ($isFollow) {
            $isFollow->delete();
        } else {
            Follow::create([
                'following_id' => $me,
                'follower_id' => $userId,
            ]);
            $followed = true;
        }

        if ($followed) {
            return redirect()->back()->with([
                'success' => 'Followed',
            ]);
        }
        return redirect()->back()->with([
            'error' => 'Unfollowed',
        ]);
    }
}
