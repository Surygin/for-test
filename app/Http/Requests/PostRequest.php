<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:2|max:144',
            'description' => 'required|string|min:2|max:250',
            'content' => 'required|string|min:20',
            'category_id' => 'required',
            'profile_id' => 'required',

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
            'profile_id.required' => 'Пользователь должна быть выбрана',
        ];
    }
}
