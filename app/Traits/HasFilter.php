<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter(Builder $builder, array $data): Builder
    {
        $ClassName = "App\\Http\\Filters\\" . class_basename($this) . 'Filter';
        if (class_exists($ClassName)){
            return (new $ClassName)->apply($builder, $data);
        }
        return $builder;
    }
}
