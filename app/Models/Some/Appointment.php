<?php

namespace App\Models\Some;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function theoreticalProgramming()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\TheoreticalProgramming', 'mp_theoretical_programming_id');
    }

}
