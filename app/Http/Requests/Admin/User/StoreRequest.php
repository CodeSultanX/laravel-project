<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'role' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Заполните поле',
            'name.required' => 'Заполните поле',
            'email.required' => 'Заполните поле',
            'email.unique' => 'Данный пользователь уже зарегистрирован',
            'role.required' => 'Заполните поле',
            'role.integer' => 'Заполните поле',
        ];
    }
}
