<?php

namespace App\Models\Fq;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class RequestFile extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'file_name', 'file_path'
    ];

    public function request() {
        return $this->belongsTo('\App\Models\Fq\FqRequest');
    }

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $table = 'fq_request_files';
}
