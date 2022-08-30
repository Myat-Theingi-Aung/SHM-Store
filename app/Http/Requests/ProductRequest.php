<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'brand' => 'required',
            'original_price' => 'required',
<<<<<<< Updated upstream
            'offer_price' => 'required',
            'photo' => 'required|sometimes|image|mimes:jpeg,png,jpg',
=======
            'offer_price' => 'nullable',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg',
>>>>>>> Stashed changes
            'description' => 'required',
        ];
    }
}