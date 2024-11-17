<?php

namespace App\Http\Requests;

use App\Enums\NewsStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsRequest extends FormRequest
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
            'title' => 'required|max:255|string|unique:news,title',
            'slug' => 'sometimes|required|max:255|string|unique:news,slug',
            'body' => 'sometimes|required|string',
            'thumbnail' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => [
                'required',
                'sometimes',
                Rule::enum(NewsStatusEnum::class)
            ],
        ];
    }
}
