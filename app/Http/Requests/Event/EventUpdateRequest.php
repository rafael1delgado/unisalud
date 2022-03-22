<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'mobile_id'             => 'required|exists:samu_mobiles,id',
            'key_id'                => 'required|exists:samu_keys,id',
            'return_key_id'         => 'nullable|exists:samu_keys,id',
            'observation'           => 'nullable|string|min:0|max:5000',
            'external_crew'         => 'nullable|string|min:0|max:5000',

            'departure_at'              => 'nullable|date_format:H:i',
            'mobile_departure_at'       => 'nullable|date_format:H:i',
            'mobile_arrival_at'         => 'nullable|date_format:H:i',
            'route_to_healtcenter_at'   => 'nullable|date_format:H:i',
            'healthcenter_at'           => 'nullable|date_format:H:i',
            'patient_reception_at'      => 'nullable|date_format:H:i',
            'return_base_at'            => 'nullable|date_format:H:i',
            'on_base_at'                => 'nullable|date_format:H:i',

            'address'       => 'nullable|string|min:0|max:255',
            'commune_id'    => 'nullable|exists:communes,id',
            
            'patient_unknown'               => 'nullable|boolean',
            'patient_identifier_type_id'    => 'nullable|exists:cod_con_identifier_types,id',
            'patient_identification'        => 'nullable|string|min:0|max:255',
            'patient_name'                  => 'nullable|string|min:0|max:255',
            
            'reception_detail'      => 'nullable|string|min:0|max:5000',
            'establishment_id'      => 'nullable|exists:organizations,id',
            'establishment_details' => 'nullable|string|min:0|max:255',
            'reception_person'      => 'nullable|string|min:0|max:255',
            'reception_place_id'    => 'nullable|exists:samu_reception_places,id',

            'rau'               => 'nullable|string|min:0|max:255',
            'vital_signs'       => 'nullable',

            'treatment'         => 'nullable|string|min:0|max:5000',
            'observation_sv'    => 'nullable|string|min:0|max:5000',

            'save_close'        => 'nullable|string',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'patient_unknown'   => isset($this->patient_unknown) ? true : false,
        ]);
    }
}
