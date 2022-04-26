<?php

namespace App\Http\Resources\MedicalProgrammer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'specialty_id' => $this->specialty->id_specialty,
            'profession_id' => $this->profession ?? $this->profession_id,
            'activity_id' => $this->activity->id_activity,
            'abbreviation' => $this->sub_activity_abbreviated,
            'name' => $this->sub_activity_name,
            'description' => $this->sub_activity_description,
            'performance' => $this->performance,
        ];
    }
}
