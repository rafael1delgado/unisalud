<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Samu\Mobile;
use App\Models\Samu\Call;
use App\Models\Samu\Shift;
use App\Models\Samu\QtcCounter;
use App\Models\User;


class Qtc extends Model implements Auditable
{   
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_qtcs";

    protected $fillable = [
        'counter',
        'date',
        
        'shift_id',
        'key_id',
        'return_key_id',
        'mobile_in_service_id',
        'mobile_id',

        /* Tiempos */
        'departure_at',
        'mobile_departure_at',
        'mobile_arrival_at',
        'route_to_healtcenter_at',
        'healthcenter_at',
        'patient_reception_at',
        'return_base_at',
        'on_base_at',

        'observation',
        
        /* Paciente */
        'patient_unknown',
        'patient_identification',
        'patient_name',
        
        /* Recepción en centro asistencial */
        'reception_detail',
        'establishment_id',
        'reception_person',
        'rau',
        
        /* Asignacion signos vitales */
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
    ];

    public function shift() 
    {
        return $this->belongsTo(Shift::class);
    }

    public function key()
    {
       return $this->belongsTo(Key::class);
    }

    public function returnKey()
    {
       return $this->belongsTo(Key::class,'return_key_id');
    }

    public function mobileInService()
    {
        return $this->belongsTo(MobileInService::class); 
    }

    public function mobile() 
    {
        return $this->belongsTo(Mobile::class);
    }

    public function establishment()
    {
       return $this->belongsTo(Organization::class,'establishment_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    public function getColorAttribute()
    {
        if(!$this->mobile_departure_at) $color = 'danger';
        if($this->mobile_departure_at) $color = 'warning';
        if($this->return_base_at) $color = 'info';
        if($this->on_base_at) $color = 'success';
        return $color;
    }

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        self::creating(function (Qtc $qtc): void {
            /* Asigna el creador */
            $qtc->creator()->associate(auth()->user());

            $counter = QtcCounter::useNext();
            $qtc->counter = $counter->counter;
            $qtc->date    = $counter->date;
        });

    }


    public function users()
    {
        return $this->belongsToMany(User::class,'samu_qtc_user','qtc_id')

                    ->using(QtcUser::class)
                    ->withPivot('id','job_type_id')
                    ->withTimestamps();
    }

}
