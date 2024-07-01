<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return abilities()->contains('create_videos');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cover' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            "title_ar" => ["required", "string:50"],
            "title_en" => ["required", "string:50"],
            "link" => ["required", "string:255", "unique:videos", "url"],
        ];
    }
}
