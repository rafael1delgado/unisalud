<?php

namespace App\Models\RRHH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //para softdelte

class MedicalLicence extends Model
{
    use HasFactory;
    use SoftDeletes;//para softdelte

    protected $fillable=["fecha_inicio_reposo","n_dias","tipo_licencia","tipo_reposo","lugar_reposo","reposo_parcial"]; //todas las consultas que  deban ser cargadas en un formulario
    protected $dates=["fecha_inicio_reposo",'deleted_at'];//el atributo fecha de aca para adelante ,//para softdelte

    
}

