<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:2|max:30',
            'second_name' => 'required|string|min:2|max:30',
            'third_name' => 'string|max:30',
            'gender' => 'required|integer|max:1',
            'is_married' => 'required|integer|max:1',
            'birthed_at' => 'required|date',
            'user_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Данное поле должно быть заполненно',
            'first_name.min' => 'Не менее 2 символов',
            'first_name.max' => 'Не более 30 символов',
            'second_name.required' => 'Данное поле должно быть заполненно',
            'second_name.min' => 'Не менее 2 символов',
            'second_name.max' => 'Не более 30 символов',
            'third_name.max' => 'Не более 30 символов',
            'gender.required' => 'Данное поле должно быть заполненно',
            'gender.integer' => 'Данное поле должно быть числом',
            'gender.max' => 'Не более одной цифры',
            'is_married.required' => 'Данное поле должно быть заполненно',
            'is_married.integer' => 'Данное поле должно быть числом',
            'is_married.max' => 'Не более одной цифры',
            'birthed_at.required' => 'Данное поле должно быть заполненно',
            'birthed_at.date' => 'Данное поле должно быть датой',
            'user_id.required' => 'Данное поле должно быть заполненно',
            'user_id.integer' => 'Данное поле должно быть числом',

        ];
    }
}
