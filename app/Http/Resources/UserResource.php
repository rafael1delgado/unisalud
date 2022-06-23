<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /*iid
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->text,
            'given_name' => $this->given,
            'fathers_family' => $this->fathers_family,
            'mothers_family' => $this->mothers_family,
            'sex' => $this->actualSex()->id,
            'gender' => $this->actualGender()->id,
            'birthday' => $this->birthday->format('d/m/Y H:i:s'),
            'deceased_at' => optional($this->deceased_datetime)->format('d/m/Y H:i:s'),
            'marital_status' => optional($this->maritalStatus)->id,
            'nationality' => optional($this->nationality)->code_deis,
        ];
    }
}
