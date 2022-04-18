<?php

namespace App\Http\Resources\Some;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'cancel_reason_id' => $this->cod_con_cancel_reason_id,
            'type_id' => $this->cod_con_appointment_type_id,
            'description' => $this->description,
            'start' => $this->start,
            'end' => $this->end,
            'created' => $this->created,
            'prog_prop_detail_id' => $this->mp_prog_prop_detail_id,
            'mp_theoretical_programming_id' => $this->mp_theoretical_programming_id,
        ];
    }
}
