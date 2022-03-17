<?php

namespace App\Models\Samu;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'commune_id',
    ];

    public function commune()
    {
        return $this->hasOne('App\Models\Commune','id','commune_id');
    }

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'samu_communes';
}
