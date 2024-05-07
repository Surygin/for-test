<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:2|max:20',
            'description' => 'required|string|min:5|max:144',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Данное поле должно быть заполнено',
            'title.min' => 'Не менее 2 символов',
            'title.max' => 'Не более 20 символов',
            'description.required' =>'Данное поле должно быть заполнено',
            'description.min' => 'Не менее 5 символов',
            'description.max' => 'Не более 144 символов'
        ];
    }
}
