<?php

namespace App\Models\Fq;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FqRequest extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = [
        'name', 'specialties', 'other_specialty', 'observation_patient',
        'prescription_file', 'date_confirm', 'observation_patient', 'patient_id'
    ];

    public function patient() {
        return $this->belongsTo('\App\Models\Fq\FqPatient');
    }

    public function contactUser() {
        return $this->belongsTo('\App\Models\Fq\ContactUser');
    }

    public function getNameValueAttribute(){
        switch ($this->name) {
            case 'specialty hours':
              return 'Horas de especialidad';
              break;
            case 'medicines':
              return 'Medicamentos';
              break;
            case 'exam order':
              return 'Orden de exámenes';
              break;
            case 'home hospitalization':
              return 'Contacto con hospitalización domiciliaria';
              break;
            default:
              return '';
              break;
        }
    }

    public function getStatusValueAttribute(){
        switch ($this->status) {
            case 'pending':
              return 'Pendiente';
              break;
            case 'complete':
              return 'Completada';
              break;
            case 'rejected':
              return 'Rachazada';
              break;
            default:
              return '';
              break;
        }
    }

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $dates = [
        'date_confirm', 'date_confirm_record'
    ];

    protected $table = 'fq_requests';
}
