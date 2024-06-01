<?php

namespace App\Models;

use App\Traits\HasFilter;
use App\Traits\HasObserver;
use App\Traits\HasRelationLoger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes, HasObserver, HasRelationLoger;

    protected $fillable = [
        'content',
        'profile_id',
        'post_id',
        'comment_id'
    ];
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function category()
    {
        return $this->post->category();
    }

    public function likedProfiles(): MorphToMany
    {
        return $this->morphToMany(Profile::class, 'likeable', 'likes');
    }

}
