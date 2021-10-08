<?php

namespace App\Models\Some;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sic extends Model
{
    use HasFactory;

    public function status()
    {
        return $this->belongsTo(SicStatus::class, 'sic_status_id');
    }

}
