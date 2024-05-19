<?php

namespace App\Models;

use App\Traits\HasObserver;
use App\Traits\HasRelationLoger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory, SoftDeletes, HasObserver, HasRelationLoger;

    protected $fillable = [
        'title'
    ];
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

}
