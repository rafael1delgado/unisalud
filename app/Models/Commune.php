<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commune extends Model
{
    use HasFactory;

    public function agreements() {
        return $this->hasMany('App\Agreement\Agreement');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    use SoftDeletes;

/**
 * The attributes that should be mutated to dates.
 *
 * @var array
 */
protected $dates = ['deleted_at'];

}
