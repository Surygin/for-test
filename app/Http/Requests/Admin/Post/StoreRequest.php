<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'body.title' => 'required|string|min:2|max:144',
            'body.description' => 'required|string|min:2|max:250',
            'body.content' => 'required|string|min:2',
            'body.category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|string',
            'img' => 'nullable|file'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Данное поле должно быть заполнено',
            'title.min' => 'Не менее 2 символов',
            'title.max' => 'Не более 144 символов',
            'description.required' => 'Данное поле должно быть заполнено',
            'description.min' => 'Не менее 2 символов',
            'description.max' => 'Не более 250 символов',
            'content.required' => 'Данное поле должно быть заполнено',
            'content.min' => 'Не менее 20 символов',
            'category_id.required' => 'Категория должна быть выбрана',
//            'profile_id.required' => 'Пользователь должна быть выбрана',
        ];
    }

    protected function passedValidation()
    {
        return [
            $this->merge([
                'body' => [
                    ...$this->body,
                    'profile_id' => auth()->user()->profile->id,
                ],
                'tags' => $this->tags ? explode(',', $this->tags) : []
            ])
        ];
    }
}
