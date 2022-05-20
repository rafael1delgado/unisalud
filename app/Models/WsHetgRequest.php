<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WsHetgRequest extends Model
{
    use HasFactory;

    const APPOINTMENT_SEND = 'appointment_send';
}
