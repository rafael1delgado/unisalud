<?php

namespace App\Models\Samu;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;
// use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
// use Carbon\Carbon;
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

    public function users() {
        return $this->belongsToMany(User::class, 'samu_shift_user')
            ->withPivot('job_type_id')
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
        return Shift::where('status',1)->exists() ? true : false;
        
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