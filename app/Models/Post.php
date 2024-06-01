<?php

namespace App\Models;

use App\Traits\HasFilter;
use App\Traits\HasObserver;
use App\Traits\HasRelationLoger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes, HasObserver, HasRelationLoger, HasFilter;

    protected $fillable = [
        'title',
        'description',
        'content',
        'category_id',
        'profile_id',
        'views'
    ];

    protected $appends = ['some'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function likedProfiles()
    {
        return $this->morphToMany(Profile::class, 'likeable', 'likes');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    protected static function booted(): void
    {
        static::retrieved(function ($model) {
            $model->logers()->create([
                    'operation_type' => 'read',
                ]);
        });
    }

    public function getSomeAttribute()
    {
        return 123123123123123;
    }
}
