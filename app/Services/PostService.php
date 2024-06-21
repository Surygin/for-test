<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public static function store($data): Post
    {
        $path = Storage::disk('public')->put('/posts', $data['body']['img']);

        try {
            DB::beginTransaction();

            $tags = TagService::storeBatch($data['tags']);
            $post = Post::create($data['body']);
            $post->tags()->attach($tags->pluck('id'));
            $post->image()->create([
                'url' => $path
            ]);

            DB::commit();
        } catch (\Exception $exception) {

            DB::rollBack();
            Storage::disk('public')->delete($path);
            $post = new Post();

        }

        return $post;
    }

    public static function getImage($data): string
    {
        return Storage::disk('public')->url($data);
    }
}
