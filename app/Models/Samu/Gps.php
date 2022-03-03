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
        'latitude',
        'longitude',
        'altitude',
        'anotation',
        'satelite',
        'speed',
        'precision',
        'address',
        'operator',
        'time_start',
        'time',
        'date_diff',
        'date',
        'hour_diff',
        'battery',
        'is_charging',
        'android_identifier',
        'serial',
        'file',
        'profile',
        'hdop',
        'vdop',
        'pod',
        'travel',
        'mobile_id'
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
