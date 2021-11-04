<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class CodeKey extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;
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