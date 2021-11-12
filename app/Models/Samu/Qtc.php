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
    protected $table="samu_qtcs";

    protected $fillable = [
        'class_qtc',
        'hour',
        'call_reception',
        'telephone_information',
        'applicant',
        'direction',
        'telephone',
        'key_id',
        'return_key_id',
        'created_at'
    ];

    public function follow()
    {
        return $this->hasOne('\App\Models\Samu\Follow');
    }

    public function key()
    {
       return $this->belongsTo(Key::class);
    }

    public function returnKey()
    {
       return $this->belongsTo(Key::class,'return_key_id');
    }
}
