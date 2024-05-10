<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Like extends Model
{
    use HasFactory;

//    public function post()
//    {
//        return $this->belongsToMany(Post::class);
//    }

//    public function like_profiles2(): BelongsToMany
//    {
//        return $this->belongsToMany(Profile::class, 'likes', 'post_id', 'profile_id');
//    }
}
