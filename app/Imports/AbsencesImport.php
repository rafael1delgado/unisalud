<?php

namespace App\Imports;

use App\Models\Absence;
use App\Models\Identifier;
use App\Models\MedicalProgrammer\Contract;
use App\Models\Practitioner;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Concerns\Importable;

class AbsencesImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, WithEvents
{
    use Importable, SkipsFailures;
    private $rows = 0;
    private $totalRows;
    private $now;

    public function __construct() 
    {
        $this->now = Carbon::now();
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->rows;

        return new Absence([
            'user_id' => $row['user_id'],
            'contract_id' => $row['contract_id'] ?? null,
            'practitioner_id' => $row['practitioner_id'],
            'health_insurance'  => $row['salud'],
            'social_insurance'  => $row['afp'],
            'legal_quality'  => $row['calidad_juridica'],
            'staff'  => $row['planta'],
            'res_number'  => $row['n_resolucion'],
            'res_date'  => $row['fresolucion'],
            'start_date'  => $row['finicio'],
            'end_date'  => $row['ftermino'],
            'total_days'  => $row['total_dias_ausentismo'],
            'period_days'  => $row['ausentismo_en_el_periodo'],
            'license_cost'  => $row['costo_de_licencia'],
            'type'  => $row['tipo_de_ausentismo'],
            'balance_days_not_replaced'  => $row['saldo_dias_no_reemplazados'],
            'load_source' => 'excel',
            'created_at' => $this->now,
            'updated_at' => $this->now,
        ]);
    }

    public function getUserId($rut)
    {
        return Identifier::where('value', $rut)->value('user_id');
    }

    public function getContractId($user_id, $service_code)
    {
        return Contract::whereHas('service', function($q) use ($service_code){
            $q->where('service_code', $service_code);
        })->where('user_id', $user_id)->value('id');
    }

    public function getPractitionerId($user_id, $sirh_code)
    {
        return Practitioner::whereHas('organization', function($q) use ($sirh_code){
            $q->where('sirh_code', $sirh_code);
        })->where('user_id', $user_id)->value('id');
    }

    public function userHasAbsenceWithExistingDates($user_id, $start_date, $end_date)
    {
        return Absence::where('user_id', $user_id)->where('start_date', '<=', $start_date)->where('end_date', '>=', $end_date)->exists();
    }

    public function transformDate($value, $format = 'Y-m-d')
     {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
     } 

    public function getRowCount(): int
    {
        return $this->rows;
    }

    public function getTotalRowCount(): int
    {
        return $this->totalRows;
    }

    public function prepareForValidation($data, $index)
    {
        // Antes de procesar a validar se formatea las fechas para que los reconozcan como tipo date
        foreach(array('fresolucion', 'finicio', 'ftermino') as $key)
            if(gettype($data[$key]) == 'integer')
                $data[$key] = $this->transformDate($data[$key]);

        //Se obtiene user_id, practitioner_id y contract_id de la ausencia para su posterior valuación si existen
        $data['user_id'] = $data['rut'] ? $this->getUserId($data['rut']) : null;
        $data['contract_id'] = $data['user_id'] && $data['codigo_unidad'] ? $this->getContractId($data['user_id'], $data['codigo_unidad']): null;
        $data['practitioner_id'] = $data['user_id'] && $data['codigo_de_establecimiento'] ? $this->getPractitionerId($data['user_id'], $data['codigo_de_establecimiento']) : null;
        
        //Se consulta si existen ausencias de usuarios con fechas ya registradas en la bd. Para agilizar la consulta pregunto además si tiene user_id, contract_id y practitioner_id vigente
        if($data['user_id'] && $data['contract_id'] && $data['practitioner_id'] && $this->userHasAbsenceWithExistingDates($data['user_id'], $data['finicio'], $data['ftermino']))
            $data['absence_with_existing_dates'] = true;
        
        return $data;
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'contract_id' => 'required',
            'practitioner_id' => 'required',
            'total_dias_ausentismo' => 'required',
            'finicio' => 'required|date',
            'ftermino' => 'required|date|after_or_equal:finicio',
            'absence_with_existing_dates' => 'prohibited',
        ];
    }

    public function customValidationMessages()
    {
        return [
            // 'subscription_plan.in' => 'this subscription plan does not exist',
        ];
    }

    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            BeforeImport::class => function(BeforeImport $event) {
                $this->totalRows = $event->getReader()->getTotalRows();
                $this->totalRows = reset($this->totalRows); // leer total de lineas primera hoja
            },
        ];
    }
}
