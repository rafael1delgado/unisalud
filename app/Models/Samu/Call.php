<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Samu\Shift;
use App\Models\Samu\Qtc;
use App\Models\Samu\Ot;


class Call extends Model implements Auditable
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
        'shift_id',
        'qtc_id',
        'ot_id'
    ];

    public function qtc()
    {
        return $this->belongsTo(Qtc::class,'qtc_id');
    }

    public function ot()
    {
        return $this->belongsTo(Ot::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
