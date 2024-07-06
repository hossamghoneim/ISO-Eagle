<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return abilities()->contains('update_products');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'structure_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'panel_image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            "name_ar" => ["required", "string:255", new NotNumbersOnly()],
            "name_en" => ["required", "string:255", new NotNumbersOnly()],
            "description_ar" => ["required", "string:255", new NotNumbersOnly()],
            "description_en" => ["required", "string:255", new NotNumbersOnly()],
        ];
    }
}
