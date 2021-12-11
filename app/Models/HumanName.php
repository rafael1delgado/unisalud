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
        'given',
        'fathers_family',
        'mothers_family',
        'prefix',
        'suffix'
    ];

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = [
        'period_start',
        'period_end'
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
        self::creating(function (HumanName $humanName): void {
            $humanName->given = trim($humanName->given);
            $humanName->fathers_family = trim($humanName->fathers_family);
            $humanName->mothers_family = trim($humanName->mothers_family);

            $humanName->text = $humanName->given.' '.$humanName->fathers_family.' '.$humanName->mothers_family;
            $humanName->period_start = now();
        });

        self::updating(function (HumanName $humanName): void {
            $humanName->given = trim($humanName->given);
            $humanName->fathers_family = trim($humanName->fathers_family);
            $humanName->mothers_family = trim($humanName->mothers_family);

            $humanName->text = $humanName->given.' '.$humanName->fathers_family.' '.$humanName->mothers_family;
            $humanName->period_start = now();
        });
    }
}
