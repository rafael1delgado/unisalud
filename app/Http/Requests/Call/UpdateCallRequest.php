<?php

namespace App\Http\Requests\Call;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCallRequest extends FormRequest
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
            'applicant'         => 'nullable|string|min:0|max:255',
            'year'              => 'nullable|integer|min:0|max:150',
            'month'             => 'nullable|integer|min:0|max:12',
            'telephone'         => 'nullable|string',
            'reason'            => 'nullable|string|min:0|max:255',
            'police_intervention'=> 'nullable|boolean',
            'information'       => 'required|string|min:3|max:5000',
            'commune_id'        => 'nullable|exists:communes,id',
            'address'           => 'nullable|string|min:0|max:255',
            'latitude'          => 'nullable|numeric',
            'longitude'         => 'nullable|numeric',
            'regulation'        => 'nullable|string|min:3|max:5000',
            'sex' => [
                'nullable',
                Rule::in(['MALE', 'FEMALE', 'UNKNOWN', 'OTHER']),
            ],
            'classification'    => [
                'nullable',
                Rule::in(['T1', 'T2', 'NM', 'OT']),
            ],
        ];
    }
}
