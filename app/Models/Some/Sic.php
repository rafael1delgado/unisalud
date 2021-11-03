<?php

namespace App\Models\Some;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sic extends Model
{
    use HasFactory;


    protected $fillable = ['num_sic', 'num_sic_ges', 'fecha_solic', 'hora_solic', 'fecha_digitacion', 'hora_digitacion',
        'cod_ssalud', 'cod_estab', 'cod_espec', 'nombre_pac', 'apellido_pat', 'apellido_mat', 'tipo_documento', 'rut_pac',
        'dig_ver_pac', 'num_documento', 'ind_sexo_pac', 'fech_nac_pac', 'domicilio_pac', 'tipo_via', 'tipo_via', 'cod_comuna_pac',
        'telefono1', 'telefono1', 'cod_estab_der', 'cod_espec_der', 'ind_motivo', 'det_motivo_consulta', 'nom_hip_diag',
        'cod_diag', 'ind_auge', 'nom_problem_auge', 'sub_problem_auge', 'nom_fund_diag', 'nom_examen', 'cod_rut_prof', 'dv_rut_prof',
        'nombre_prof', 'ape_pat_prof', 'ape_mat_prof', 'titulo_prof', 'ind_urgencia', 'rut_titular', 'dig_ver_tit', 'nombre_tit',
        'ape_pat_tit', 'ape_mat_tit', 'sistema_previsional', 'ind_previs', 'venc_prev', 'num_fonasa', 'rut_ins', 'prais',
        'nombre_social', 'nombre_tutor', 'email', 'nacionalidad', 'etnia', 'estado_civil', 'sic_status_id'
    ];

    public function status()
    {
        return $this->belongsTo(SicStatus::class, 'sic_status_id');
    }

    protected $dates = ['pcdFechaSolic', 'pcsFechaDigitacion', 'pcdFechNacPac', 'pcdVencPrev',
    ];

}
