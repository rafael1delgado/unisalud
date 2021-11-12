<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;


class Qtc extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;
    protected $table="samu_calls";

    protected $fillable = [
        
        'class_call',
        'hour',
        'call_reception',
        'telephone_information',
        'applicant',
        'direction',
        'telephone',
        'created_at'    

    ];

    public function follow()
    {
        return $this->hasOne('\App\Models\Samu\Follow');
    }
}
