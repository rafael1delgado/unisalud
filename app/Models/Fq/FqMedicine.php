<?php

namespace App\Models\Fq;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FqMedicine extends Model
{
    use HasFactory;

    public function medicine() {
        return $this->belongsTo('\App\Models\ExtMedicine', 'medicines_id');
    }

    protected $table = 'fq_medicines';
}
