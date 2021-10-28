<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Samu\Shift;
use App\Models\User;

class Mobile extends Model
{
    use HasFactory;

    protected $table="samu_mobiles";

    protected $fillable = [
        'id',
        'code',
        'name',
        'plate',
        'type',
        'description',
        'status'
    ];

}
