<?php

namespace App\Http\Requests\Dashboard;

use App\Rules\NotNumbersOnly;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('update_services');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $service = request()->route('service');

        return [
            'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            "name_ar" => ["required", "string:255", "unique:services,name_ar,$service->id", new NotNumbersOnly()],
            "name_en" => ["required", "string:255", "unique:services,name_en,$service->id", new NotNumbersOnly()],
            "description_ar" => ["required", "string:255", new NotNumbersOnly()],
            "description_en" => ["required", "string:255", new NotNumbersOnly()],
        ];
    }
}
