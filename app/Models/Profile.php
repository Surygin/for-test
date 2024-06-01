<?php

namespace App\Models;

use App\Traits\HasObserver;
use App\Traits\HasRelationLoger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Profile extends Model
{
    use HasFactory, SoftDeletes, HasObserver, HasRelationLoger;

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

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable'); //, 'recordable_type', 'recordable_id'
    }

    public function getIsAdminAttribute(): bool
    {
        return $this->roles->contains('title', 'Администратор');
    }
}
