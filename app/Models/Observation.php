<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Observation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'description'
        //, 'user_id'
    ];
    public function appointments()
    {
        return $this->morphToMany(Appointment::class, 'appointable');
    }

}
