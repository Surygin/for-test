<?php

namespace App\Models;

use App\Traits\HasFilter;
use App\Traits\HasObserver;
use App\Traits\HasRelationLoger;
use App\Traits\ObserverTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes, HasObserver, HasRelationLoger, HasFilter;

    protected $fillable = [
        'title',
        'description'
    ];
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(Comment::class, Post::class);
    }

    public function comment(): HasOneThrough
    {
        return $this->hasOneThrough(Comment::class, Post::class)
            ->where('comments.content', 'like', '%аоыдва%');
    }

}
