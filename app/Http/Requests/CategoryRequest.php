<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        return [
            'category' => [
                'required',
                'string',
                Rule::unique('categories')->ignore($this->id)
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'category.required' => 'Category is required.',
            'category.string' => 'Category must be a string.',
            'category.unique' => 'Category already exists.',
        ];
    }
}
