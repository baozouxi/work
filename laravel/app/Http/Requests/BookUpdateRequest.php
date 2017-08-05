<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
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
            'name' => [
                'regex:/^[\x7f-\xff]+$/',
                'required',
                'min:2',
                'max:30'],
            'age' => 'numeric|required|min:0|max:99',
            'phone' => [
                'regex:/^(?:13\d|18\d|15\d|17\d|14\d)\d{5}(\d{3}|\*{3})$/',
                'required'],
            'postdate' => 'required|date|after:today',
            'undate' => 'numeric|max:1',
            'dis' => 'required|numeric',
            'province' => 'required|numeric|not_in:0',
            'city' => 'required|numeric|not_in:0',
            'town' => 'required|numeric|not_in:0',
            'address' => 'nullable|string|max:255',
            'content' => 'required|min:10|max:255|string',
            'chatlog' => 'nullable|string|min:10',
            'job' => 'nullable|string',
            'qq' => 'nullable|string|min:5|max:13',
            'weixin' => 'nullable|string|min:5',
            'website' => 'nullable|numeric',
            'source' => 'nullable|numeric',
            //'filpath' => 'alpha_dash|nullable' 上传功能实现再来写验证  
        ];
    }
}
