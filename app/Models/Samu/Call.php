<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;


class Call extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;
    protected $table="samu_calls";

    protected $fillable = [
        'class_call',
        'hour',
        'call_reception',
        'telephone_information',
        'applicant',
        'direction',
        'telephone',
        'shift_id',
        'created_at'    

    ];

    public function Qtc()
    {
        return $this->hasOne('\App\Models\Samu\Qtc');
    }

    public function shifts()
    {
        return $this->hasMany(Shifts::class, 'shift_id');
    }
}
