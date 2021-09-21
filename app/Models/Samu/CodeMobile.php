<?php

namespace App\Models\Samu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeMobile extends Model
{
    use HasFactory;
    protected $table="samu_code_mobiles";

    protected $fillable = [
        'mobile_code',
        'name_mobile_code',
        'created_at'
    ];
}
