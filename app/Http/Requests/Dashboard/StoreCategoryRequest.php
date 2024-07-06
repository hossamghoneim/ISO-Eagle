<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return abilities()->contains('create_categories');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'icon' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'name_ar' => ['required', 'min:3', 'string', "unique:categories", new NotNumbersOnly()],
            'name_en' => ['required', 'min:3', 'string', "unique:categories", new NotNumbersOnly()],
        ];
    }
}
