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
        'call_id',
        'classification',
        'hour',
        'receptor_id',
        'information',
        'applicant',
        'address',
        'telephone',
        'shift_id',
        'regulator_id',
        'clasificator_id'
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
    
    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        /* Asigna el creador */
        self::creating(function (Call $call): void {
            $call->receptor()->associate(auth()->user());
        });
    }
}
