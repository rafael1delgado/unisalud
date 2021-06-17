<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalProgrammer\Specialty;

class HmSpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Specialty::Create(['id_specialty'=>'7020130','specialty_name'=>'PEDIATRÍA','color'=>'CBFFBF']);
      Specialty::Create(['id_specialty'=>'7020230','specialty_name'=>'MEDICINA INTERNA','color'=>'0004FF']);
      Specialty::Create(['id_specialty'=>'7020330','specialty_name'=>'NEONATOLOGÍA','color'=>'52FFF1']);
      Specialty::Create(['id_specialty'=>'7020331','specialty_name'=>'ENFERMEDAD RESPIRATORIA PEDIÁTRICA (BRONCOPULMONAR INFANTIL)','color'=>'FFFFFF']);
      Specialty::Create(['id_specialty'=>'7020332','specialty_name'=>'ENFERMEDAD RESPIRATORIA DE ADULTO (BRONCOPULMONAR)','color'=>'3526FF']);
      Specialty::Create(['id_specialty'=>'7024219','specialty_name'=>'CARDIOLOGÍA PEDIÁTRICA','color'=>'F58EFF']);
      Specialty::Create(['id_specialty'=>'7020500','specialty_name'=>'CARDIOLOGÍA ADULTO','color'=>'BAFFD2']);
      Specialty::Create(['id_specialty'=>'7020501','specialty_name'=>'ENDOCRINOLOGÍA PEDIÁTRICA','color'=>'FF2B59']);
      Specialty::Create(['id_specialty'=>'7020600','specialty_name'=>'ENDOCRINOLOGÍA ADULTO','color'=>'42FF49']);
      Specialty::Create(['id_specialty'=>'7020601','specialty_name'=>'GASTROENTEROLOGÍA PEDIÁTRICA','color'=>'FFC3AF']);
      Specialty::Create(['id_specialty'=>'7020700','specialty_name'=>'GASTROENTEROLOGÍA ADULTO','color'=>'D0FF9D']);
      Specialty::Create(['id_specialty'=>'7020800','specialty_name'=>'GENÉTICA CLÍNICA','color'=>'FFD0EA']);
      Specialty::Create(['id_specialty'=>'7020801','specialty_name'=>'HEMATO-ONCOLOGÍA INFANTIL','color'=>'CEFFB7']);
      Specialty::Create(['id_specialty'=>'7020900','specialty_name'=>'HEMATOLOGÍA ADULTO','color'=>'B7DCFF']);
      Specialty::Create(['id_specialty'=>'7020901','specialty_name'=>'NEFROLOGÍA PEDIÁTRICA','color'=>'F8D0FF']);
      Specialty::Create(['id_specialty'=>'7021000','specialty_name'=>'NEFROLOGÍA ADULTO','color'=>'FFD8F9']);
      Specialty::Create(['id_specialty'=>'7021001','specialty_name'=>'NUTRIÓLOGO PEDIÁTRICO','color'=>'F6FF37']);
      Specialty::Create(['id_specialty'=>'7021100','specialty_name'=>'NUTRIÓLOGO ADULTO','color'=>'FC77FF']);
      Specialty::Create(['id_specialty'=>'7021101','specialty_name'=>'REUMATOLOGÍA PEDIÁTRICA','color'=>'EDC1FF']);
      Specialty::Create(['id_specialty'=>'7021230','specialty_name'=>'REUMATOLOGÍA ADULTO','color'=>'FFFFFF']);
      Specialty::Create(['id_specialty'=>'7021300','specialty_name'=>'DERMATOLOGÍA','color'=>'72FFFC']);
      Specialty::Create(['id_specialty'=>'7021301','specialty_name'=>'INFECTOLOGÍA PEDIÁTRICA','color'=>'FFB2EF']);
      Specialty::Create(['id_specialty'=>'7022000','specialty_name'=>'INFECTOLOGÍA ADULTO','color'=>'FFFCEA']);
      Specialty::Create(['id_specialty'=>'7022001','specialty_name'=>'INMUNOLOGÍA','color'=>'EAD3FF']);
      Specialty::Create(['id_specialty'=>'7021531','specialty_name'=>'GERIATRÍA','color'=>'ADFFF2']);
      Specialty::Create(['id_specialty'=>'7022132','specialty_name'=>'MEDICINA FÍSICA Y REHABILITACIÓN PEDIÁTRICA (FISIATRÍA PEDIÁTRICA)','color'=>'D8FFED']);
      Specialty::Create(['id_specialty'=>'7022133','specialty_name'=>'MEDICINA FÍSICA Y REHABILITACIÓN ADULTO (FISIATRÍA ADULTO)','color'=>'F4F4FF']);
      Specialty::Create(['id_specialty'=>'7022134','specialty_name'=>'NEUROLOGÍA PEDIÁTRICA','color'=>'26FF3E']);
      Specialty::Create(['id_specialty'=>'7021700','specialty_name'=>'NEUROLOGÍA ADULTO','color'=>'D4C6FF']);
      Specialty::Create(['id_specialty'=>'7021800','specialty_name'=>'ONCOLOGÍA MÉDICA','color'=>'1814FF']);
      Specialty::Create(['id_specialty'=>'7021801','specialty_name'=>'PSIQUIATRÍA PEDIÁTRICA Y DE LA ADOLESCENCIA','color'=>'F8DBFF']);
      Specialty::Create(['id_specialty'=>'7021900','specialty_name'=>'PSIQUIATRÍA ADULTO','color'=>'04FF85']);
      Specialty::Create(['id_specialty'=>'7022130','specialty_name'=>'CIRUGÍA PEDIÁTRICA','color'=>'AB2567']);
      Specialty::Create(['id_specialty'=>'7022142','specialty_name'=>'CIRUGÍA GENERAL ADULTO','color'=>'D81604']);
      Specialty::Create(['id_specialty'=>'7022143','specialty_name'=>'CIRUGÍA DIGESTIVA (ALTA)','color'=>'D869C0']);
      Specialty::Create(['id_specialty'=>'7022144','specialty_name'=>'CIRUGÍA DE CABEZA, CUELLO Y MAXILOFACIAL','color'=>'D869C0']);
      Specialty::Create(['id_specialty'=>'7022135','specialty_name'=>'CIRUGÍA PLÁSTICA Y REPARADORA PEDIÁTRICA','color'=>'D869C0']);
      Specialty::Create(['id_specialty'=>'7022136','specialty_name'=>'CIRUGÍA PLÁSTICA Y REPARADORA ADULTO','color'=>'A081FF']);
      Specialty::Create(['id_specialty'=>'7022137','specialty_name'=>'COLOPROCTOLOGÍA (CIRUGIA DIGESTIVA BAJA)','color'=>'89C6FF']);
      Specialty::Create(['id_specialty'=>'7022700','specialty_name'=>'CIRUGÍA TÓRAX','color'=>'FFB8A5']);
      Specialty::Create(['id_specialty'=>'7022800','specialty_name'=>'CIRUGÍA VASCULAR PERIFÉRICA','color'=>'E7FFEE']);
      Specialty::Create(['id_specialty'=>'7022900','specialty_name'=>'NEUROCIRUGÍA','color'=>'218CFF']);
      Specialty::Create(['id_specialty'=>'7021701','specialty_name'=>'CIRUGÍA CARDIOVASCULAR','color'=>'67FF14']);
      Specialty::Create(['id_specialty'=>'7023100','specialty_name'=>'ANESTESIOLOGÍA','color'=>'FF59F2']);
      Specialty::Create(['id_specialty'=>'7023200','specialty_name'=>'OBSTETRICIA','color'=>'B2ECFF']);
      Specialty::Create(['id_specialty'=>'7023201','specialty_name'=>'GINECOLOGÍA PEDIÁTRICA Y DE LA ADOLESCENCIA','color'=>'FFEDFA']);
      Specialty::Create(['id_specialty'=>'7023202','specialty_name'=>'GINECOLOGÍA ADULTO','color'=>'F6FF93']);
      Specialty::Create(['id_specialty'=>'7023203','specialty_name'=>'OFTALMOLOGÍA','color'=>'44C6D8']);
      Specialty::Create(['id_specialty'=>'7023700','specialty_name'=>'OTORRINOLARINGOLOGÍA','color'=>'A3FFE5']);
      Specialty::Create(['id_specialty'=>'7023701','specialty_name'=>'TRAUMATOLOGÍA Y ORTOPEDIA PEDIÁTRICA','color'=>'A692D8']);
      Specialty::Create(['id_specialty'=>'7023702','specialty_name'=>'TRAUMATOLOGÍA Y ORTOPEDIA ADULTO','color'=>'D8CE03']);
      Specialty::Create(['id_specialty'=>'7023703','specialty_name'=>'UROLOGÍA PEDIÁTRICA','color'=>'FF0404']);
      Specialty::Create(['id_specialty'=>'7024000','specialty_name'=>'UROLOGÍA ADULTO','color'=>'23FF70']);
      Specialty::Create(['id_specialty'=>'7024001','specialty_name'=>'MEDICINA FAMILIAR DEL NIÑO','color'=>'E3BCFF']);
      Specialty::Create(['id_specialty'=>'7024200','specialty_name'=>'MEDICINA FAMILIAR','color'=>'E9FFE0']);
      Specialty::Create(['id_specialty'=>'7030500','specialty_name'=>'MEDICINA FAMILIAR ADULTO','color'=>'FFE0F8']);
      Specialty::Create(['id_specialty'=>'7024201','specialty_name'=>'DIABETOLOGÍA','color'=>'FAA8FF']);
      Specialty::Create(['id_specialty'=>'7024202','specialty_name'=>'MEDICINA NUCLEAR (EXCLUYE INFORMES)','color'=>'F6FF89']);
      Specialty::Create(['id_specialty'=>'7030501','specialty_name'=>'IMAGENOLOGÍA','color'=>'F1C9FF']);
      Specialty::Create(['id_specialty'=>'7030502','specialty_name'=>'RADIOTERAPIA ONCOLÓGICA','color'=>'FDFF44']);
      Specialty::Create(['id_specialty'=>'7030996','specialty_name'=>'LABORATORIO CLINICO','color'=>'EFFFEF']);
      Specialty::Create(['id_specialty'=>'7030997','specialty_name'=>'ANATOMÍA PATOLÓGICA','color'=>'71FF37']);
      Specialty::Create(['id_specialty'=>'7030998','specialty_name'=>'MEDICINA DE URGENCIA','color'=>'DCDBFF']);
      Specialty::Create(['id_specialty'=>'7030999','specialty_name'=>'MEDICINA INTENSIVA','color'=>'E5ECFF']);
      Specialty::Create(['id_specialty'=>'7031000','specialty_name'=>'CIRUGÍA Y TRAUMATOLOGÍA BUCO MÁXILO FACIAL','color'=>'0BE3A2']);
      Specialty::Create(['id'=>68,'id_specialty'=>'0','specialty_name'=>'CIRUGÍA Y TRAUMATOLOGÍA BUCO MÁXILO FACIAL','color'=>'05E6AD']);
      Specialty::Create(['id'=>69,'id_specialty'=>'1','specialty_name'=>'UPCP (UNIDAD PACIENTE CRITICO PEDIÁTRICO)','color'=>'AB2567']);
      Specialty::Create(['id'=>70,'id_specialty'=>'1','specialty_name'=>'UPCP (UNIDAD PACIENTE CRITICO PEDIÁTRICO)','color'=>'AB2567']);

    }
}
