<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Organization;

class Establishment extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'establishment_id',
    ];

    public function organization()
    {
        return $this->hasOne(Organization::class,'id','establishment_id');
    }
    

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $table = 'samu_establishments';
    
}
