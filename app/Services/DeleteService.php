<?php
namespace App\Services;

use App\Models\Post;

class DeleteService
{

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
    }
}
