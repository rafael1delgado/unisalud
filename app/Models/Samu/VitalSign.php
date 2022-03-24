<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VitalSign extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "samu_vital_signs";

    protected $fillable = [
        'fc',
        'fr',
        'pa',
        'pam',
        'gl',
        'soam',
        'soap',
        'hgt',
        'fill_capillary',
        't',
        'time',
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'created_at',
        'updated_at',
        'time',
    ];

    public function getTimeFormatAttribute()
    {
        return $this->time->format('d/m/Y H:i');
    }
}
