<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class AbstractFilter
{
    protected array $keys = [];
    public function apply(Builder $builder, array $data): Builder
    {
        foreach ($this->keys as $key){
            if (isset($data[$key])){
                $method = Str::camel($key);
                if (method_exists($this, $method)){
                    $this->$method($builder, $data[$key]);
                }
            }
        }
        return $builder;
    }
}
