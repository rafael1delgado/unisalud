<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Samu\Mobile;
use App\Models\Samu\Call;
use App\Models\Samu\Shift;
use App\Models\User;


class Qtc extends Model implements Auditable
{   
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_qtcs";

    protected $fillable = [

        //segumiento
        'shift_id',
        'call_id',
        'key_id',
        'return_key_id',
        'mobile_in_service_id',

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
        'establishment_id',
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

    public function calls()
    {
        return $this->belongsToMany(Call::class,'samu_call_qtc');
    }

    public function mobile() {
        return $this->belongsTo(Mobile::class);
    }

    public function shift() {
        return $this->belongsTo(Shift::class);
    }

    public function mobilInService(){
        return $this->belongsTo(MobileInService::class,'samu_mobiles_in_service','mobile_in_service_id'); 
    }

    public function key()
    {
       return $this->belongsTo(Key::class);
    }

    public function returnKey()
    {
       return $this->belongsTo(Key::class,'return_key_id');
    }

    public function establishment()
    {
       return $this->belongsTo(Organization::class,'establishment_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        /* Asigna el creador */
        self::creating(function (Qtc $qtc): void {
            $qtc->creator()->associate(auth()->user());
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
