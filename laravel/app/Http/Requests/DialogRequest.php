<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DialogRequest extends FormRequest
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
            'sjswt' => 'nullable|numeric|min:0',
            'pcswt' => 'nullable|numeric|min:0',
            'web_tel' => 'nullable|numeric|min:0',
            'zhuaqu' => 'nullable|numeric|min:0',
            'weixin' => 'nullable|numeric|min:0',
            'content' => 'required|string|min:0',
            'date' => 'required|date|before_or_equal:today',
        ];
    }
}
