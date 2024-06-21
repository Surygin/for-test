<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\Tag\TagResource;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'img' => PostService::getImage($this->image->url),
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'category_id' => CategoryResource::make($this->category,)->resolve(),
            'profile_id' => $this->profile_id,
            'tags' => TagResource::collection($this->tags)->resolve(),
            'views' => $this->views,
            'comments' => CommentResource::collection($this->comments)->resolve()
        ];
    }
}
