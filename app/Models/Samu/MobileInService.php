<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Samu\Shift;
use App\Models\Samu\Mobile;
use App\Models\Samu\MobileCrew;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\User;

class MobileInService extends Pivot
{
    use HasFactory;

    protected $table="samu_mobiles_in_service";

    protected $fillable = [
        'id',
        'shift_id',
        'mobile_id',
        'observation',
        'status'
    ];

    public function shift()
    {
        return $this->BelongsTo(Shift::class);
    }

    public function mobile()
    {
        return $this->BelongsTo(Mobile::class);
    }

    public function crew()
    {
        return $this->belongsToMany(User::class,'samu_mobile_crew','mobiles_in_service_id')
                    //->using(MobileCrew::class)
                    ->withPivot('job_type_id')
                    ->withTimestamps();
    }
}
