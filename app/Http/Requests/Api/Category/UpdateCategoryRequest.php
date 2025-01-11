<?php

namespace App\Http\Requests\Api\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        $categoryId = $this->route('category');

        $rules = [
            'name' => [
                'required',
                'string',
                'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/',
                'between:3,50',
                Rule::unique('categories', 'name')->ignore($categoryId),
            ],
            'description' => [
                'nullable',
                'string',
            ],
        ];

        if ($method == 'PUT') {
            return $rules;
        } else {
            return array_merge($rules, [
                'name' => array_merge($rules['name'], ['sometimes']),
                'status' => ['sometimes', 'required', 'boolean']
            ]);
        }
    }
}