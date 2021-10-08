<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Noveltie extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $table="samu_novelties";

    protected $fillable = [
        
        'detail',
        'shift_id',
        'created_at'    

    ];

    public function shift()
    {
        return $this->BelongsTo('\App\Models\Samu\Shift');
    }
}
