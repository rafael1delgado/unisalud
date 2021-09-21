<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeKey extends Model
{
    use HasFactory;
    protected $table='samu_code_keys'; 

    protected $fillable = [
    'key_code', 
    'name_key_code', 
    'created_at',
    ];

    //public function user()
    //{
    //    return $this->belongsTo(User::class, 'user_id');
    //}

    //public function contract()
    //{
     //  return $this->belongsTo(Contract::class, 'contract_id');
    //}

    //public function practitioner()
    //{
      //  return $this->belongsTo(Practitioner::class, 'practitioner_id');
    //}

}