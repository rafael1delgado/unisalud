<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalProgrammer\Service;

class HmServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Service::Create(['service_code'=>'123', 'service_name'=>'SERV. ANESTESIA Y PABELLONES', 'color' => NULL]);
      Service::Create(['service_code'=>'234', 'service_name'=>'SERV. CLIN. NEUROCIRUGIA', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'SERV. CLIN. OFTALMOLOGIA', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'SERV. NEUROCIRUGIA', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'SERV. UPC NEONATOLOGIA', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'SERV. CIRUGIA', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'SERV. EMERGENCIA HOSPITALARIA', 'color' => NULL]);
      Service::Create(['service_code'=>'SCGO', 'service_name'=>'SERV. GINE Y OBSTETRICIA', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'SERV. TRAUMATOLOGIA', 'color' => NULL]);
      Service::Create(['service_code'=>'UGO', 'service_name'=>'SERV. URG GINECO-OBSTETRICA', 'color' => NULL]);
      Service::Create(['service_code'=>'9', 'service_name'=>'U.P.C.A', 'color' => NULL]);
      Service::Create(['service_code'=>'10', 'service_name'=>'SERVICIO ANESTESIA Y PABELLONES QUIRUGICOS', 'color' => NULL]);
      Service::Create(['service_code'=>'11', 'service_name'=>'SERVICO DE ODONTOLOGIA Y MAXILOFACIAL', 'color' => NULL]);
      Service::Create(['service_code'=>'12', 'service_name'=>'PSIQUIATRIA ADULTO', 'color' => NULL]);
      Service::Create(['service_code'=>'13', 'service_name'=>'PSIQUIATRIA INFANTIL', 'color' => NULL]);
      Service::Create(['service_code'=>'ANP', 'service_name'=>'UD. ANATOMÍA PATOLÓGICA', 'color' => NULL]);
      Service::Create(['service_code'=>'CAR', 'service_name'=>'Cardiología', 'color' => NULL]);
      Service::Create(['service_code'=>'Uro', 'service_name'=>'Urología', 'color' => NULL]);
      Service::Create(['service_code'=>'CAI', 'service_name'=>'Cardiología Infantil', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_001', 'service_name'=>'UPF - UCMF', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_002', 'service_name'=>'Unidad Paciente Crítico Pediátrico', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_003', 'service_name'=>'Reumatología', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_004', 'service_name'=>'UHCE INFANTO ADOLESCENTE', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'CAE.UD. DE GASTRO Y ENDOSCOPIA', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_005', 'service_name'=>'UD.PAB. CENTRAL', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_006', 'service_name'=>'UD.PAB MATERNIDAD', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'CR.ODONTOLOGIA', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_007', 'service_name'=>'UD.ONCOLOGIA', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_008', 'service_name'=>'UD.MED.TRANSFUSIONAL', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_009', 'service_name'=>'UD.MED FISICA Y REHABILITA', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'CAE.UD. NEUROLOGÍA', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_010', 'service_name'=>'UD.LABORATORIO CLINICO', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'CAE.UD.GINECOLOGÍA', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_011|', 'service_name'=>'UD.IMAGENOLOGIA', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'SERV. MEDICINA', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_011', 'service_name'=>'UD.HOSPITALIZACION DOMICILIARIA', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc_012', 'service_name'=>'UD.FARMACIA', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'CAE.UD.TRASPLANTE Y PROCURAMIENTO', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc', 'service_name'=>'UD.DIALISIS', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc', 'service_name'=>'UD.CIRUGIA INFANTIL', 'color' => NULL]);
      Service::Create(['service_code'=>NULL, 'service_name'=>'SERV. PEDIATRÍA', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc', 'service_name'=>'UD.ALTO RIESGO OBSTETRICO', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc', 'service_name'=>'UD. PISO PELVICO', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc', 'service_name'=>'UD. AUDITORIA INTERNA', 'color' => NULL]);
      Service::Create(['service_code'=>'ozc', 'service_name'=>'U.P.C.A (SERV.PACIENTE CRITICO ADULTO)', 'color' => NULL]);
    }
}
