<?php

namespace App\Models;

use App\Traits\HasObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use HasFactory, SoftDeletes, HasObserver;

    protected $fillable = [
        'profile_id',
        'likeable_type',
        'likeable_id'
    ];
    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }

    public function logers()
    {
        return $this->morphMany(Loger::class, 'logerable');
    }
}
