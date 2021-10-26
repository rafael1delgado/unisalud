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

    public function users(): BelongsToMany{
        return $this->belongsToMany(User::class, 'samu_shift_user')->withTimestamps()->withPivot('job_type');
    }

    public function noveltie()
    {
        return $this->belongsTo('\App\Models\Samu\Noveltie');
    }

    public function ShiftMobiles()
    {
        return $this->belongsToMany('\App\Models\Samu\ShiftMobile','samu_shift_user')->withTimestamps()->wherePivot('id', 'detail','type');
    }
}


