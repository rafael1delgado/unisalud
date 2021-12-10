<?php

namespace App\Models\Samu;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Samu\Mobile;
use App\Models\Samu\Noveltie;
use App\Models\Samu\MobileInService;
use App\Models\Samu\ShiftUser;

class Shift extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_shifts";

    protected $fillable = [
        'id',
        'status',
        'type',
        'opening_at',
        'closing_at'
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'opening_at',
        'closing_at'
    ];


    /**
     * The users that belong to the shift.
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'samu_shift_user','shift_id')
                    ->using(ShiftUser::class)
                    ->withPivot('id','shift_id','job_type_id')
                    ->withTimestamps();
    }
    
    public function novelitie()
    {
        return $this->belongsTo(Novelitie::class);
    }

    public function mobilesInService()
    {
        return $this->hasMany(MobileInService::class);

        // return $this->belongsToMany(Mobile::class,'samu_mobiles_in_service')
        //             ->using(MobileInService::class)
        //             ->withPivot('id','observation')
        //             ->withTimestamps();
    }

    public static function todayShiftVerify()
    {
        return Shift::where('status',true)->exists() ?? false;
    }

    public function calls()
    {
        return $this->hasMany(Call::class);
    }

    public function qtcs()
    {
        return $this->hasMany(Qtc::class);
    }

    /* Obtiene el estado en palabra */
    public function getStatusInWordAttribute()
    {
        return $this->status == 1 ? 'Abierto' : 'Cerrado';
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
        self::creating(function (Shift $shift): void {
            $shift->creator()->associate(auth()->user());
        });
    }
}