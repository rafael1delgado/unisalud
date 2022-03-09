<?php

namespace App\Http\Requests\MobileInService;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MobileInServiceStoreRequest extends FormRequest
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
            'position'      => [
                'required',
                Rule::unique('samu_mobiles_in_service')
            ],
            'mobile_id'     => 'required|exists:samu_mobiles,id',
            'type'          => 'required|string',
            'o2'            => 'nullable|string|min:0|max:255',
            'observation'   => 'nullable|string|min:0|max:5000'
        ];
    }
}
