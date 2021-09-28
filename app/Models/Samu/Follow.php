<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Follow extends Model
{   
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_follows";

    protected $fillable = [

        //segumiento
        'qtc_id',
        'key',
        'key_return',
        'mobile',
        'transfer_type',
        'departure_time',
        'mobile_departure_time',
        'mobile_arrival_place',
        'route_ca',
        'mobile_ca',
        
        'patient_reception',
        'return_base',
        'mobile_base',
        'observation',
        
        //evaluación de paciente

        'reception_detail',
        'establishment',
        'reception_person',
        
        //asignacion signos vitales
        
        'fc',
        'fr',
        'pa',
        'pam',
        'gl',
        'soam',
        'soap',
        'hgt',
        'fill_capillary',
        't',
        'treatment',
        'observation_sv',
       





        'mobile_code',
        'name_mobile_code',
        'created_at'
    ];

    public function qtc()
    {
        return $this->belongsTo('\App\Models\Samu\Qtc');
    }
}
