<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Comment\CommentResource;
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
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'category_id' => $this->category_id,
            'profile_id' => $this->profile_id,
            'views' => $this->views,
            'comments' => CommentResource::collection($this->comments)->resolve()
        ];
    }
}
