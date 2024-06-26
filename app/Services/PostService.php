<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public static function index($data): LengthAwarePaginator
    {
//        return Post::filter($data)->paginate(10, ['*'], 'page', $data['page']);
        return Cache::remember(getCacheKey($data), now()->addMinutes(60), function () use ($data){
            return Post::filter($data)->paginate(10, ['*'], 'page', $data['page']);
        });
    }
    public static function store($data): Post
    {
        $path = 'default.jpg';
        if (!empty($data['body']['img'])){
            $path = Storage::disk('public')->put('/posts', $data['body']['img']);
        }

        try {
            DB::beginTransaction();

            $tags = TagService::storeBatch($data['tags']);
            $post = Post::create($data['body']);
            $post->tags()->attach($tags->pluck('id'));
            $post->image()->create([
                'url' => $path
            ]);

            DB::commit();
            Cache::flush();
        } catch (\Exception $exception) {

            DB::rollBack();
            if (!empty($path)){
                Storage::disk('public')->delete($path);
            }
            $post = new Post();

        }

        return $post;
    }

    public static function getImage($data): string
    {
        return Storage::disk('public')->url($data);
    }
}
