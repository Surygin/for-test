<?php

namespace App\Models;

use App\Traits\HasObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loger extends Model
{
    use HasFactory;
//    SoftDeletes, HasObserver

    protected $fillable = [
       'operation_type', 'old_content', 'new_content'
    ];
    public function logerable(): MorphTo
    {
        return $this->morphTo();
    }
}
