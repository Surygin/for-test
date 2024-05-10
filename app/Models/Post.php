<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function like_profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'likes', 'post_id');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable'); //, 'recordable_type', 'recordable_id'
    }

}
