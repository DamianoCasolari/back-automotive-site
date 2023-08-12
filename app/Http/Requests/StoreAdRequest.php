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
            'name' => 'required|string',
            'brand' => 'required',
            'model' => 'required|string',
            'date_of_enrollment' => 'required|date',
            'km' => 'required|numeric',
            'cover_image' => 'required|image|max:1024',
            'cover_image2' => 'image|max:1024',
            'cover_image3' => 'image|max:1024',
            'cover_image4' => 'image|max:1024',
            'cover_image5' => 'image|max:1024',
        ];
    }
}
