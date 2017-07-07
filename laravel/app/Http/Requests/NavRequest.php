<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NavRequest extends FormRequest
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
            'url' => [
                'string',
                'required',
                'regex:/(^\/{1}[a-zA-Z\d\@\!_\-\+=\(\)]+)+/'
            ],
            'parent_id' => 'integer|required|min:0'
        ];
    }
}
