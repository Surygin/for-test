<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|min:2|max:144',
            'description' => 'nullable|string|min:2|max:250',
            'content' => 'nullable|string|min:2',
            'category_id' => 'nullable|integer|exists:categories,id',
            'profile_id' => 'nullable|integer|exists:profiles,id',
            'views_from' => 'nullable|integer',
            'views_to' => 'nullable|integer',
            'created_at_from' => 'nullable|date_format:Y-m-d',
            'created_at_to' => 'nullable|date_format:Y-m-d',
            'page' => 'nullable|integer'
        ];
    }

    protected function passedValidation()
    {
        return $this->merge([
            'page' => $this->page ?? 1
        ]);
    }
}
