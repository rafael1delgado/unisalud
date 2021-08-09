<?php

namespace App\Models\MedicalProgrammer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\Auth;

class ProgrammingProposal extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'id','type','user_id','contract_id','specialty_id','profession_id','request_date','start_date','end_date','status','observation'
    ];

    use HasFactory;
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function details() {
        return $this->hasMany('App\Models\MedicalProgrammer\ProgrammingProposalDetail','programming_proposal_id');
    }

    public function signatureFlows() {
        return $this->hasMany('App\Models\MedicalProgrammer\ProgrammingProposalSignatureFlow','programming_proposal_id');
    }

    public function contract()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Contract');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Specialty');
    }

    public function profession()
    {
        return $this->belongsTo('App\Models\MedicalProgrammer\Profession');
    }

    public function employeeCanModify()
    {
      //si la solicitud ya fue confirmada, no se deja modificar a nadie
      if ($this->status == "Confirmado") {
        return 0;
      }
      else
      {
        // si tiene permisos de administración, se permite todo.
        if (Auth::user()->hasPermissionTo('Mp: Proposal - Subdirección Médica') || Auth::user()->hasPermissionTo('Mp: Proposal - Jefe de Servicio')) {
          // si solicitud solo está creada, no se deja confirmar a visadores
          if ($this->signatureFlows->last()->status == "Solicitud creada") {
            return 0;
          }else{
            return 1;
          }
        }
        else
        {
          //si es que al solicitud ya fue confirmada, no se deja modificar a funcionario
          if ($this->signatureFlows->last()->status != "Solicitud creada") {
            return 0;
          }else{
            return 1;
          }
        }
      }
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['request_date', 'start_date', 'end_date', 'deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'mp_programming_proposals';
}
