<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

use App\Models\Samu\Shift;
use App\Models\User;
use App\Models\Samu\JobType;


class ShiftUser extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table="samu_shift_user";

    protected $fillable = [
        'id',
        'shift_id',
        'user_id',
        'job_type_id'
    ];

    public function shift()
    {
        return $this->BelongsTo(Shift::class);
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
