<?php

namespace App\Models\some;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalIncomingSic extends Model
{
    use HasFactory;

    protected $fillable = ['pciNumSic', 'pciNumSicGes', 'pcdFechaSolic', 'pcsHoraSolic', 'pcsFechaDigitacion', 'pcsHoraDigitacion',
        'pcsCodSSalud', 'pcsCodEstab', 'pcsCodEspec', 'pcsNombrePac', 'pcsApellidoPat', 'pcsApellidoMat', 'pciTipoDocumento', 'pciRutPac',
        'pcsDigVerPac', 'pcsNumDocumento', 'pcsIndSexoPac', 'pcdFechNacPac', 'pcsDomicilioPac', 'pcsTipoVia', 'pcsTipoVia', 'pcsCodComunaPac',
        'pciTelefono1', 'pciTelefono1', 'pcsCodEstabDer', 'pcsCodEspecDer', 'pciIndMotivo', 'pcsDetMotivoConsulta', 'pcsNomHipDiag', 
        'pcsCodDiag', 'pcsIndAuge', 'pcsNomProblemAuge', 'pcsSubProblemAuge', 'pcsNomFundDiag', 'pcsNomExamen', 'pciCodRutProf', 'pcsDvRutProf',
        'pcsNombreProf', 'pcsApePatProf', 'pcsApeMatProf', 'pcsTituloProf', 'pcsIndUrgencia', 'pciRutTitular', 'pcsDigVerTit', 'pcsNombreTit', 
        'pcsApePatTit', 'pcsApeMatTit', 'pcsSistemaPrevisional', 'pcsIndPrevis', 'pcdVencPrev', 'pciNumFonasa', 'pciRutIns', 'pciPrais', 
        'pcsNombreSocial', 'pcsNombreTutor', 'pcsEmail', 'pcsNacionalidad', 'pcsEtnia', 'pcsEstadoCivil'
    ];
}
