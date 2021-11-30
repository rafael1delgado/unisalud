<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Samu\Qtc;
use App\Models\User;
use App\Models\Samu\JobType;
use Illuminate\Database\Eloquent\Relations\Pivot;

class QtcUser extends pivot
{
    use HasFactory;
    use SoftDeletes;
   
    protected $table="samu_qtc_user";

    protected $fillable = [
        'id',
        'qtc_id',
        'user_id',
        'job_type_id'
    ];

    public function qtc()
    {
        return $this->BelongsTo(Qtc::class, 'qtc_id');
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
