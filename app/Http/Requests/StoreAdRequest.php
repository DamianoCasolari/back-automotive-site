<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'brand' => 'required|max:100',
            'model' => 'required|string|max:100',
            'price' => 'numeric|integer|min:0|max:214748364',
            'fuel_type' => 'string|max:255',
            'transmission' => 'string|max:255',
            'cv' => 'numeric|integer|min:0|max:65000',
            'car_doors_number' => 'numeric|integer|min:3|max:255',
            'color' => 'string|max:255',
            'description' => 'string|max:65535',
            'engine_displacement' => 'numeric|min:0|max:65000',
            'date_of_enrollment' => 'required|date',
            'km' => 'required|numeric|min:0|max:2147483647',
            'cover_image' => 'required|image|max:1024',
            'cover_image2' => 'image|max:1024',
            'cover_image3' => 'image|max:1024',
            'cover_image4' => 'image|max:1024',
            'cover_image5' => 'image|max:1024',
        ];
    }
}
