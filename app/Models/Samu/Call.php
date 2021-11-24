<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\Samu\Shift;
use App\Models\Samu\Qtc;
use App\Models\Samu\Ot;
use App\Models\User;


class Call extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;
    protected $table="samu_calls";

    protected $fillable = [
        'classification',
        'hour',
        'receptor_id',
        'information',
        'applicant',
        'address',
        'telephone',
        'shift_id'
    ];

    public function qtcs()
    {
        return $this->belongsToMany(Qtc::class,'samu_call_qtc');
    }

    public function ot()
    {
        return $this->hasOne(Ot::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function receptor()
    {
        return $this->belongsTo(User::class,'receptor_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'creator_id');
    }

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        /* Asigna el creador */
        self::creating(function (Call $call): void {
            $call->creator()->associate(auth()->user());
        });
    }
}
