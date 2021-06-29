<?php

namespace App\Models;

use App\Models\MedicalProgrammer\Specialty;
use App\Models\Some\Appointment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practitioner extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'active',
        'gender',
        'birthdate',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'specialty_id');
    }

    public function appointments()
    {
        return $this->morphToMany(Appointment::class, 'appointable');
    }


}
