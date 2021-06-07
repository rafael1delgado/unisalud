<?php

namespace App\Models\Fq;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPatient extends Model
{
    use HasFactory;
    use softDeletes;

    public function user() {
        return $this->belongsTo('\App\Models\User', 'patient_id');
    }

    protected $table = 'fq_users_patients';
}
