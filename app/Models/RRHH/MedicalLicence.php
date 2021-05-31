<?php

namespace App\Models\RRHH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MedicalLicence extends Model
{
    use HasFactory;
    protected $fillable=["fecha_inicio_reposo","n_dias","tipo_licencia","tipo_reposo","lugar_reposo"]; //todas las consultas que  deban ser cargadas en un formulario
    protected $dates=["fecha_inicio_reposo",];//el atributo fecha de aca para adelante

    
}

