<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Samu\Shift;
use App\Models\Samu\Qtc;
use App\Models\User;

class Mobile extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table="samu_mobiles";

    protected $fillable = [
        'id',
        'code',
        'name',
        'plate',
        'type',
        'description',
        'status',
        'managed'
    ];

    

}
