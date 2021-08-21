<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeDislike extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'post_id', 'status'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
