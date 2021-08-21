<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class UpdateService
{
    public function getUpdate(Request $request,$id)
    {
        $isUpdated = Post::find($id)->update($request->all());
        return $isUpdated;


    }

}
