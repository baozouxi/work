<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TakeRequest extends FormRequest
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
            'dose' => 'required|numeric|min:0',
            'hospitalization_cost' => 'required|numeric|min:0',
            'drug_cost' => 'required|numeric|min:0',
            'treatment_cost' => 'required|numeric|min:0',
            'check_cost' => 'required|numeric|min:0',
            'content' => 'required|string|min:0',
            'doctor' => 'required|numeric|min:0',
        ];
    }
}
