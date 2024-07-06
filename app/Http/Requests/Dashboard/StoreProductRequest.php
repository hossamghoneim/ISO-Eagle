<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return abilities()->contains('create_products');
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
            'structure_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'panel_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            "name_ar" => ["required", "string:255", "unique:products", new NotNumbersOnly()],
            "name_en" => ["required", "string:255", "unique:products", new NotNumbersOnly()],
            "description_ar" => ["required", "string:255", new NotNumbersOnly()],
            "description_en" => ["required", "string:255", new NotNumbersOnly()],
            'images' => 'required|array|max:5',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }
}
