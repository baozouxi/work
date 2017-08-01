<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'string|required',
            'username' => 'string|required|min:5',
            'password' => 'string|required|min:5',
            'weixin' => 'nullable|string',
            'qq' =>  'nullable|numeric',
            'role_id' => 'required|numeric|min:1',
            'is_use' => 'nullable|numeric|in:0,1',
            'tel' => 'required|numeric'
        ];
    }
}
