<?php

namespace App\Models;

use App\Traits\HasObserver;
use App\Traits\HasRelationLoger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes, HasObserver, HasRelationLoger;

    protected $fillable = [
        'title'
    ];
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

}
