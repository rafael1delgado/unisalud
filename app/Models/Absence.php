<?php

namespace App\Models;

use App\Models\MedicalProgrammer\Contract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Absence extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'health_insurance', 'social_insurance', 'legal_quality', 'staff', 'res_number', 'res_date', 'start_date', 'end_date',
        'total_days', 'period_days', 'license_cost', 'type', 'balance_days_not_replaced'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    public function practitioner()
    {
        return $this->belongsTo(Practitioner::class, 'practitioner_id');
    }

    protected $dates = ['res_date', 'start_date', 'end_date', 'deleted_at'];
}
