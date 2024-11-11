<?php

namespace App\Http\Requests;

use App\Enums\RiskLevelEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReportRequest extends FormRequest
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
            'category_id' => 'integer|exists:categories,id',
            'report_user_id' => 'integer|exists:users,id',
            'title' => 'string',
            'description' => 'string',
            'risk_level' => [
                Rule::enum(RiskLevelEnum::class)
            ],
            'province_id' => 'integer|exists:provinces,id',
            'regency_id' => 'integer|exists:regencies,id',
            'district_id' => 'integer|exists:districts,id',
            'village_id' => 'integer|exists:villages,id',

            'latitude' => 'numeric|between:-90,90',
            'longitude' => 'numeric|between:-180,180',
        ];
    }
}
