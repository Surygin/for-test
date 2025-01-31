<?php

namespace App\Models;

use App\Traits\HasObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes, HasObserver;

    protected $fillable = [
        'url',
        'imageable_type',
        'imageable_id'
    ];
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }

    public function logers()
    {
        return $this->morphMany(Loger::class, 'logerable');
    }
}

