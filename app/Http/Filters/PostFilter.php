<?php

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;
class PostFilter extends AbstractFilter
{

    protected array $keys = [
        'title',
        'description',
        'content',
        'category_id',
        'profile_id',
        'views_from',
        'views_to',
        'created_at_from',
        'created_at_to'
    ];

    protected function title(Builder $builder, $value): Builder
    {
        return $builder->where("title", "ilike", "%$value%");
    }

    protected function description(Builder $builder, $value): Builder
    {
        return $builder->where("description", "ilike", "%$value%");
    }

    protected function content(Builder $builder, $value): Builder
    {
        return $builder->where("content", "ilike", "%$value%");
    }

    protected function categoryId(Builder $builder, $value): Builder
    {
        return $builder->where('category_id', '=', $value);
    }

    protected function profileId(Builder $builder, $value): Builder
    {
        return $builder->where('profile_id', '=', $value);
    }

    protected function viewsFrom(Builder $builder, $value): Builder
    {
        return $builder->where('views', '>=', $value);
    }

    protected function viewsTo(Builder $builder, $value): Builder
        {
            return $builder->where('views', '<=', $value);
        }

    protected function createdAtFrom(Builder $builder, $value): Builder
    {
        return $builder->whereDate('created_at', '>=', $value);
    }

    protected function createdAtTo(Builder $builder, $value): Builder
    {
        return $builder->whereDate('created_at', '<=', $value);
    }


}
