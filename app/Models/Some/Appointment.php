<?php

namespace App\Models\Some;

use App\Models\Practitioner;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function theoreticalProgramming()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\TheoreticalProgramming', 'mp_theoretical_programming_id');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'appointable')->withTimestamps()->withPivot('type', 'required', 'status', 'period_from', 'period_to');
    }

    public function practitioners()
    {
        return $this->morphedByMany(Practitioner::class, 'appointable')->withTimestamps()->withPivot('type', 'required', 'status', 'period_from', 'period_to');
    }

}
