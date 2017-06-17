<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientTrackRequest extends FormRequest
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
            'aid' => 'required|min:0|numeric',
            'content' => 'required|string|min:0',
            'postdate' => 'required|date|after_or_equal:today',
            'filepath' => 'nullable|string',
            'state' => 'nullable|numeric|min:0'
        ];
    }
}
