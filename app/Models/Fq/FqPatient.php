<?php

namespace App\Models\Fq;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FqPatient extends Model
{
    use HasFactory;
    use softDeletes;

    public function usersPatients() {
        return $this->hasMany('\App\Models\Fq\UserPatient');
    }

    public function getRunFormatAttribute() {
        return $this->run . '-' . $this->dv;
    }

    public function getFullNameAttribute() {
        return mb_convert_case(mb_strtolower("{$this->name} {$this->fathers_family} {$this->mothers_family}"), MB_CASE_TITLE, "UTF-8");
    }

    protected $table = 'fq_patients';
}
