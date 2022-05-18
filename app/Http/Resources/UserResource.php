<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'full_name' => $this->text,
            'given_name' => $this->given,
            'fathers_family' => $this->fathers_family,
            'mothers_family' => $this->mothers_family,
            'sex' => $this->sex,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'deceased_at' => $this->deceased_datetime,
            'marital_status' => optional($this->maritalStatus)->text,
            'nationality' => optional($this->nationality)->name,
        ];
    }
}
