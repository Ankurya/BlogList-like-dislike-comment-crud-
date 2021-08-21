<?php

namespace App\Http\Controllers;

use App\Models\LikeDislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeDislikeController extends Controller
{
    public function like(Request $request)
    {
        $user_id = $request->user_id;
        $post_id = $request->post_id;
        $like = LikeDislike::where(['post_id' => $post_id, 'user_id' => $user_id]);

        if ($like->exists()){
            $like->delete();
        } else {

            $like = LikeDislike::where(['post_id' => $post_id, 'user_id' => Auth::user()->id]);
            $like = new LikeDislike;
            $like->post_id = $post_id;
            $like->user_id = Auth::user()->id;
            $like->status = '0';
            $like->save();

        }

    }

}
