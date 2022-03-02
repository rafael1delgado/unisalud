<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gps extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'lat',
        'lon',
        'desc',
        'mobile_id',
        'sat',
        'alt',
        'spd',
        'time',
        'batt',
        'aid',        
    ];

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'samu_gps';


    public function mobile()
    {
        return $this->belongsTo(Mobile::class);
    }
}
