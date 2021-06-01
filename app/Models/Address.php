<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'use',
        'type',
        'text',
        'line',
        'city',
        'district',
        'state',
        'postal_code',
        'country',
        'apartment',
        'user_id',
        'suburb',
    ];

}
