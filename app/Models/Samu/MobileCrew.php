<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Samu\JobType;

class MobileCrew extends Model
{
    use HasFactory;

    protected $table="samu_mobile_crew";

    protected $fillable = [
        'id',
        'mobiles_in_service_id',
        'user_id',
        'job_type_id'
    ];

    public function jobType()
    {
        return $this->BelongsTo(JobType::class);
    }

}
