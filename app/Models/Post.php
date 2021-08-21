<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\LikeDislike;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    // use BlogPost;
    use HasFactory;
    protected $dates = ['deleted_at'];

    protected $table = 'posts';

    protected $casts = [
        'number' => 'decimal:0',
    ];

    protected $fillable = [
        'user_id',
        'title',
        'number',
        'description',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function likes()
    {
        return $this->hasMany(LikeDislike::class);
    }

}
