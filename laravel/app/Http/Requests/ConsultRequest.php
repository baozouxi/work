<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultRequest extends FormRequest
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
            'dis' => 'required|numeric',
            'way' => 'required|numeric|min:0',
            'province' => 'required|numeric|not_in:0',
            'city' => 'required|numeric|not_in:0',
            'town' => 'required|numeric|not_in:0',
            'content' => 'required|min:10|max:255|string',
            'filepath' => 'nullable|string',
            'address' => 'nullable|string',
            'track_time' => 'required|date|after_or_equal:today',
        ];
    }
}
