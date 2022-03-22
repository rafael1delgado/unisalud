<?php

namespace App\Models;

use App\Models\Samu\Call;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'observation',
        'latitude',
        'longitude',
        'call_id',
    ];

    public function call()
    {
        return $this->belongsTo(Call::class);
    }
}
