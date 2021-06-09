<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtMedicine extends Model
{
    use HasFactory;
    use softDeletes;

    protected $hidden = [
        'id', 'health_strategy', 'code', 'name', 'created_at', 'updated_at'
    ];

    protected $table = 'ext_medicines';
}
