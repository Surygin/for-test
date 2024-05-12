<?php

namespace App\Http\Resources\Profile;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'third_name' => $this->third_name,
            'gender' => $this->gender,
            'is_married' => $this->is_married,
            'birthed_at' => $this->birthed_at,
            'user_id' => $this->user_id
        ];
    }
}
