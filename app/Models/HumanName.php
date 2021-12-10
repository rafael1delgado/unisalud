<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HumanName extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'use',
        'text',
        'given',
        'fathers_family',
        'mothers_family',
        'prefix',
        'suffix'
    ];

    public function getfullNameAttribute()
    {
        return "{$this->text} {$this->fathers_family} {$this->mothers_family}";
    }

    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function booted()
    {
        /* Asigna el creador */
        self::creating(function (HumanName $humanName): void {
            $humanName->text = $humanName->given.' '.$humanName->fathers_family.' '.$humanName->mothers_family;
            $humanName->period_start = now();
        });


    }

}
