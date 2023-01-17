<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'preview_image' => 'nullable|image',
            'main_image' => 'nullable|image',
            'content' => 'required|string',
            'category_id' => 'required|int|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|int|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны быть строкой',
            'preview_image.required' => 'Это поле необходимо для заполнения',
            'preview_image.image' => 'Необходимо выбрать изображение',
            'main_image.required' => 'Это поле необходимо для заполнения',
            'main_image.image' => 'Необходимо выбрать изображение',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны быть строкой',
            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.int' => 'Id категории должен быть числом',
            'category_id.exists' => 'Id категории должен быть в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных',
        ];
    }
}
