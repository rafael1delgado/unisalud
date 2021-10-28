<?php

namespace App\Models\Samu;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Samu\Mobile;
use App\Models\Samu\MobileInService;

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
        'created_at'
    ];

    public function users(): BelongsToMany{
        return $this->belongsToMany(User::class, 'samu_shift_user')->withTimestamps()->withPivot('job_type');
    }

    public function noveltie()
    {
        return $this->belongsTo('\App\Models\Samu\Noveltie');
    }

    public function mobilesInService()
    {
        return $this->belongsToMany(Mobile::class,'samu_mobiles_in_service')
                    ->using(MobileInService::class)
                    ->withPivot('id','observation')
                    ->withTimestamps();
    }
}