<?php

namespace App\Models;

use App\Models\Some\Appointment;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id', 'description'
        //, 'user_id'
    ];

    public function appointments()
    {
        return $this->morphToMany(Appointment::class, 'appointable');
    }
}
