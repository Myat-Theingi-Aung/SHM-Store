<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequestUpdate extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => 'required',
            'email'    => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->route('id'))
            ],
            'password' => 'nullable',
            'role'     => 'required',
            'phone'    => 'nullable',
            'address'  => 'nullable',
            'photo'    => 'sometimes|image|mimes:jpeg,png,jpg',
        ];
    }
}
