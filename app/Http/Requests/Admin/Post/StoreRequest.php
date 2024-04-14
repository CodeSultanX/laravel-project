<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Заполните поле',
            'title.string' => 'Поле должна быть строкой',
            'content.required' => 'Заполните поле',
            'category_id.required' => 'Заполните поле',
            'preview_image.required' => 'Выберите файл',
            'main_image.required' => 'Выберите файл',
            'content.string' => 'Поле должна быть строкой',
        ];
    }
}
