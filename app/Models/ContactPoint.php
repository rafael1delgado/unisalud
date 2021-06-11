<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPoint extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'system',
        'value',
        'use',
        'rank',
        'period_id',
    ];

    public function getUseValueAttribute(){
        switch ($this->use) {
            case 'home':
              return 'Hogar';
              break;
            case 'work':
              return 'Trabajo';
              break;
            case 'old':
              return 'Antiguo';
              break;
            case 'temp':
              return 'Temporal';
              break;
            case 'mobile':
              return 'Móvil';
              break;
            default:
              return '';
              break;
        }
    }

}
