<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class ShiftMobile extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;
    protected $table="samu_shift_mobile";

    protected $fillable = [
        
        'detail',
        'shift_id',
        'mobile_id',
        'type',
        'created_at'    

    ];

    public function shift()
    {
        return $this->BelongsTo('\App\Models\Samu\Shift');
    }

    public function code_mobiles()
    {
        return $this->belongsToMany('\App\Models\Samu\CodeMobile')->withTimestamps()->wherePivot('id', 'detail','type');
    }

    public function shifts()
    {
        return $this->belongsToMany('\App\Models\Samu\Shift')->withTimestamps()->wherePivot('id', 'detail','type');
    }
}
