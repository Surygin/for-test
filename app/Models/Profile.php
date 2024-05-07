<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function like_posts()
    {
        return $this->belongsToMany(Post::class, 'likes', 'profile_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
