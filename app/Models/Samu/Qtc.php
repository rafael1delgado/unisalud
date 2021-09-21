<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qtc extends Model
{
    use HasFactory;
    protected $table="samu_qtcs";

    protected $fillable = [
        
        'class_qtc',
        'hour',
        'call_reception',
        'telephone_information',
        'applicant',
        'direction',
        'telephone',
        'created_at'    

    ];

    public function follow()
    {
        return $this->hasOne(Follow::class, 'qtc_id');
    }
}
