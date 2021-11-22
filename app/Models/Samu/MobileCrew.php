<?php

namespace App\Models\Samu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Samu\MobileInService;
use App\Models\User;
use App\Models\Samu\JobType;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MobileCrew extends pivot
{
    
    use HasFactory;
    use SoftDeletes;
   
    protected $table="samu_mobile_crew";

    protected $fillable = [
        'id',
        'mobiles_in_service_id',
        'user_id',
        'job_type_id'
    ];

    public function mobileInService()
    {
        return $this->BelongsTo(MobileInService::class, 'mobiles_in_service_id');
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function jobType()
    {
        return $this->BelongsTo(JobType::class);
    }

}
