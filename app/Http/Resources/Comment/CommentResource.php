<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'content' => $this->content,
            'profile_id' => $this->profile_id,
            'post_id' => $this->post_id,
            'comment_id' => $this->comment_id,
        ];
    }
}
