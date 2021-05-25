<?php

namespace App\Models\Fq;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPatient extends Model
{
    use HasFactory;
    use softDeletes;

    public function patient() {
        return $this->belongsTo('\App\Models\Fq\FqPatient');
    }

    protected $table = 'fq_users_patients';
}
