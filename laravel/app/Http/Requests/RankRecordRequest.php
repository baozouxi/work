<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RankRecordRequest extends FormRequest
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
            'content' => 'nullable|string|min:5',
            'click' => 'required|numeric|min:0',
            'cost' => 'required|numeric|min:0',
            'show_times' => 'required|numeric|min:0',
            'rank_date' => 'required|date',
            'rank_way' => 'required|numeric|min:0'
            ];
    }
}
