<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Noveltie extends Model implements Auditable
{

    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $table="samu_novelties";

    protected $fillable = [
        
        'detail',
        'shift_id',
        'created_at'    

    ];

    public function shift()
    {
        return $this->BelongsTo('\App\Models\Samu\Shift', 'shift_id');
    }
}
