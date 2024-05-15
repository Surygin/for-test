<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'second_name',
        'third_name',
        'gender',
        'is_married',
        'birthed_at',
        'user_id'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likedPosts()
    {
        return $this->morphedByMany(Post::class, 'likeable', 'likes');
    }

    public function likedComments()
    {
        return $this->morphedByMany(Comment::class, 'likeable', 'likes');
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
