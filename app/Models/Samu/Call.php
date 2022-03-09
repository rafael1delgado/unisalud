<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Samu\Shift;
use App\Models\Samu\Event;
use App\Models\Samu\Ot;
use App\Models\User;
use App\Models\Commune;


class Call extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_calls";

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'shift_id',
        'call_id',
        'commune_id',
        'classification',
        'clasificator_id',
        'regulator_id',
        'receptor_id',
        'hour',
        'reason',
        'police_intervention',
        'information',
        'regulation',
        'sex',
        'applicant',
        'age',
        'address',
        'latitude',
        'longitude',
        'telephone',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'hour',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class,'samu_call_event');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
    
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    public function receptor()
    {
        return $this->belongsTo(User::class,'receptor_id');
    }

    public function regulator()
    {
        return $this->belongsTo(User::class,'regulator_id');

    }

    /* Una llamada puede hace referencia o tener relación con otra llamada  */
    public function referenceCall()
    {
        return $this->belongsTo(Call::class,'call_id');
    }
    
    /* Una llamada puede tener muchas llamadas asociadas  */
    public function associatedCalls()
    {
        return $this->hasMany(Call::class);
    }

    public function getSexAbbrAttribute()
    {
        switch($this->sex)
        {
            case 'MALE': return 'MASC'; break;
            case 'FEMALE': return 'FEM'; break;
            case 'UNKNOWN': return 'DESC'; break;
            case 'OTHER': return 'OTRO'; break;
        }
    }

    public function getAgeFormatAttribute()
    {
        if($this->age) {
            list($integer, $decimal) = explode('.', $this->age);

            $edad = '';

            if($integer != '00')
            {
                $edad .= $integer == '01' ? (int)$integer . ' AÑO ': (int)$integer . ' AÑOS ';
            }

            if($decimal != '00')
            {
                $edad .= $decimal == '01' ? (int)$decimal . ' MES ': (int)$decimal . ' MESES ';
            }
            return $edad;
        }
    }

    public function scopeWithClassification($query, $type)
    {
        return $query->whereIn('classification', $type);
    }
}
