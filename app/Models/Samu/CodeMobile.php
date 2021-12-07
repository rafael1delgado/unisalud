<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;


class CodeMobile extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;
    protected $table="samu_code_mobiles";

    protected $fillable = [
        'mobile_code',
        'name_mobile_code',
        'created_at'
    ];

    public function ShiftsMobiles()
    {
        return $this->belongsToMany('\App\Models\Samu\ShiftMobile','samu_shift_user')->withTimestamps()->wherePivot('id', 'detail','type');
    }
}
