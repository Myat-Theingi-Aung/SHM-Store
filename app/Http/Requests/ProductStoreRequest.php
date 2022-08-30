<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'photo' => 'required|sometimes|image|mimes:jpeg,png,jpg',
            'offer_price' => 'nullable',
            'original_price' => 'required|integer',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg',
            'description' => 'required',
        ];
    }
}