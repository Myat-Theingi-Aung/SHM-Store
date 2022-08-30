<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class OrderSearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'start_date' => 'nullable',
            'end_date' => 'nullable' 
        ];
    }
}