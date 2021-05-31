<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CodConIdentifiersTypes extends Model
{
    use HasFactory;
    public function agreements() {
        return $this->hasMany('App\Agreement\Agreement');
    }

    protected $fillable = [
        'text'
    ];
    
    use SoftDeletes;

/**
 * The attributes that should be mutated to dates.
 *
 * @var array
 */
protected $dates = ['deleted_at'];
}
