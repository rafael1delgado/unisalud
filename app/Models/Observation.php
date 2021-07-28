<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Observation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'status', 'cod_con_obs_categories_id', 'type', 'description'
        //, 'user_id'
    ];
    public function appointments()
    {
        return $this->morphToMany(Appointment::class, 'appointable');
    }

}
