<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;

class UpdateFeatureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_features');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $feature = request()->route('feature');

        return [
            'product_id' => ['required', 'exists:products,id'],
            'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            "headline_ar" => ["required", "string:255", "unique:features,headline_ar,$feature->id", new NotNumbersOnly()],
            "headline_en" => ["required", "string:255", "unique:features,headline_en,$feature->id", new NotNumbersOnly()],
            "details_ar" => ["required", "string:255", new NotNumbersOnly()],
            "details_en" => ["required", "string:255", new NotNumbersOnly()],
        ];
    }
}
