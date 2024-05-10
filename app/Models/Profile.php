<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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

    public function like_posts2()
    {
        return $this->belongsToMany(Post::class, 'likes', 'profile_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable'); //, 'recordable_type', 'recordable_id'
    }
}
