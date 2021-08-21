<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class LikeUnlikeController extends Controller
{
    public function actOnComment(Request $request, $id)
    {
        $action = $request->get('action');
        switch ($action) {
            case 'Like':
                Comment::where('id', $id)->increment('likes_count');
                break;
            case 'Unlike':
                Comment::where('id', $id)->decrement('likes_count');
                break;
        }
        event(new CommentAction($id, $action));
        return '';
    }
}
