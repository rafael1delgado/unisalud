<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class CalendarProgramming extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        // 'rut',
        'user_id','specialty_id', 'profession_id', 'activity_id', 'operating_room_id', 'start_date', 'end_date'
    ];

    public function operatingRoom()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\OperatingRoom');
    }

    // public function unscheduledProgramming() {
    //     return $this->belongsTo('App\Models\MedicalProgrammer\UnscheduledProgramming');
    // }

    // public function rrhh()
    // {
    //     return $this->belongsTo('App\Models\MedicalProgrammer\Rrhh', 'rut');
    // }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Specialty');
    }

    public function profession()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Profession');
    }

    public function activity()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Activity');
    }

    // public function user()
    // {
    //     return $this->belongsTo('App\User');
    // }

    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mp_calendar_programming';
}
