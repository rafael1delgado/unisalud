<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Samu\Mobile;


class Qtc extends Model implements Auditable
{   
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_qtcs";

    protected $fillable = [

        //segumiento
        'call_id',
        'key_id',
        'return_key_id',
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

    public function qtc() {
        return $this->hasOne(Call::class);
      }

    public function mobile() {
        return $this->belongsTo(Mobile::class);
    }


    public function mobilesInService(){
        return $this->hasMany(MobileInService::class,'mobile', 'id');
                
    }

    public function key()
    {
       return $this->belongsTo(Key::class);
    }

    public function returnKey()
    {
       return $this->belongsTo(Key::class,'return_key_id');
    }

}
