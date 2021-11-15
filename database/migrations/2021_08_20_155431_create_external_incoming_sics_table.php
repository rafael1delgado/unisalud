<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalIncomingSicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_incoming_sics', function (Blueprint $table) {
            $table->id();
            $table->integer('sic_number')->nullable();
            $table->integer('sic_number_ges')->nullable();
            $table->date('request_date')->nullable();
            $table->string('request_time')->nullable();
            $table->date('entry_date')->nullable();
            $table->string('entry_time')->nullable();
            $table->string('health_service_code')->nullable();
            $table->string('establishment_code')->nullable();
            $table->string('specialty_code')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('patient_fathers_family')->nullable();
            $table->string('patient_mothers_family')->nullable();
            $table->integer('patient_document_type')->nullable();
            $table->integer('patient_rut')->nullable();
            $table->string('patient_dv')->nullable();
            $table->string('patient_document_number')->nullable();
            $table->string('patient_sex_indicator')->nullable();
            $table->date('patient_birthday')->nullable();
            $table->string('patient_address')->nullable();
            $table->string('patient_street_type')->nullable();
            $table->string('patient_street_name')->nullable();
            $table->string('patient_commune_code')->nullable();
            $table->integer('patient_phone_1')->nullable();
            $table->integer('patient_phone_2')->nullable();
            $table->string('derivation_establishment_code')->nullable();
            $table->string('derivation_specialty_code')->nullable();
            $table->string('motive_indicator')->nullable();
            $table->string('motive_consultation_detail')->nullable();
            $table->string('diagnosis_hypothesis')->nullable();
            $table->string('diagnosis_code')->nullable();
            $table->string('auge_indicator')->nullable();
            $table->string('auge_problem')->nullable();
            $table->string('auge_subproblem')->nullable();
            $table->string('diagnosis_basis')->nullable();
            $table->string('exam_name')->nullable();
            $table->integer('professional_rut')->nullable();
            $table->string('professional_dv')->nullable();
            $table->string('professional_name')->nullable();
            $table->string('professional_fathers_family')->nullable();
            $table->string('professional_mothers_family')->nullable();
            $table->string('professional_job_title')->nullable();
            $table->string('urgency_indicator')->nullable();
            $table->integer('titular_rut')->nullable();
            $table->string('titular_dv')->nullable();
            $table->string('titular_name')->nullable();
            $table->string('titular_fathers_name')->nullable();
            $table->string('titular_mothers_name')->nullable();
            $table->string('pension_system')->nullable();
            $table->string('pension_system_categorization')->nullable();
            $table->date('pension_system_expiration')->nullable();
            $table->integer('fonasa_number')->nullable();
            $table->integer('certifying_institution_rut')->nullable();
            $table->integer('prais')->nullable();
            $table->string('patient_social_name')->nullable();
            $table->string('tutor_name')->nullable();
            $table->string('patient_email')->nullable();
            $table->string('patient_nationality')->nullable();
            $table->string('patient_ethnicity')->nullable();
            $table->string('patient_marital_status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('external_incoming_sics');
    }
}
