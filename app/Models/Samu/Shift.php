<?php

namespace App\Models\Samu;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_shift";

    protected $fillable = [
        'id',
        'status',
        'type',
        'date',
        'opening_time',
        'closing_time',
        // 'manager_shift',
        // 'regulatory_doctor',
        // 'regulatory_nurse',
        'created_at'
    ];

    // public function manager(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'manager_shift');
    // }

    // public function doctor(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'regulatory_doctor');
    // }

    // public function nurse(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'regulatory_nurse');
    // }

    public function users(): BelongsToMany{
        return $this->belongsToMany(User::class, 'samu_shift_user')->withTimestamps()->withPivot('job_type');
    }

    public function users_manager_shift(): BelongsToMany{
        return $this->belongsToMany(User::class, 'samu_shift_user')->withTimestamps()->wherePivot('job_type', 'jefe de turno');
    }
    
    public function users_regulatory_doctor(): BelongsToMany{
        return $this->belongsToMany(User::class, 'samu_shift_user')->withTimestamps()->wherePivot('job_type', 'medico regulador');
    }

    public function users_regulatory_nurse(): BelongsToMany{
        return $this->belongsToMany(User::class, 'samu_shift_user')->withTimestamps()->wherePivot('job_type', 'enfermera reguladora');
    }

    public function users_operators(): BelongsToMany{
        return $this->belongsToMany(User::class, 'samu_shift_user')->withTimestamps()->wherePivot('job_type', 'operador');
    }

    public function users_dispatchers(): BelongsToMany{
        return $this->belongsToMany(User::class, 'samu_shift_user')->withTimestamps()->wherePivot('job_type', 'despachador');
    }
}


