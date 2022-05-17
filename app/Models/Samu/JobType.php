<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use OwenIt\Auditing\Contracts\Auditable;

class JobType extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table="samu_job_types";

    protected $fillable = [
        'id',
        'name',
        'tripulant',
    ];

    public function getShortNameAttribute()
    {
        return Str::substr($this->name, 0, 1);
    }
}
