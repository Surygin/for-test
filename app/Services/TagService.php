<?php

namespace App\Services;


use App\Models\Tag;
use Illuminate\Support\Collection;

class TagService
{
    public static function storeBatch(array $data): Collection
    {
        $result = [];
        foreach ($data as $title)
        {
            $result[] = Tag::firstOrCreate([
               'title' => $title
            ]);
        }

        return collect($result);
    }
}
