<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Samu\Event;
use App\Models\User;
use App\Models\Samu\JobType;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EventUser extends pivot
{
    use HasFactory;
    use SoftDeletes;
   
    protected $table="samu_event_user";

    protected $fillable = [
        'id',
        'event_id',
        'user_id',
        'job_type_id'
    ];

    public function event()
    {
        return $this->BelongsTo(Event::class, 'event_id');
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
