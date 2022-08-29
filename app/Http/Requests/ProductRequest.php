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
            'original_price' => 'required|integer',
            'offer_price' => 'nullable',
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg',
            'description' => 'required',
        ];
    }
}