<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sics', function (Blueprint $table) {
            $table->id();
            $table->integer('num_sic')->nullable();
            $table->integer('num_sic_ges')->nullable();
            $table->date('fecha_solic')->nullable();
            $table->string('hora_solic')->nullable();
            $table->date('fecha_digitacion')->nullable();
            $table->string('hora_digitacion')->nullable();
            $table->string('cod_salud')->nullable();
            $table->string('cod_estab')->nullable();
            $table->string('cod_espec')->nullable();
            $table->string('nombre_pac')->nullable();
            $table->string('apellido_pat')->nullable();
            $table->string('apellido_mat')->nullable();
            $table->integer('tipo_documento')->nullable();
            $table->integer('rut_pac')->nullable();
            $table->string('dig_ver_pac')->nullable();
            $table->string('num_documento')->nullable();
            $table->string('ind_sexo_pac')->nullable();
            $table->date('fech_nac_pac')->nullable();
            $table->string('domicilio_pac')->nullable();
            $table->string('tipo_via')->nullable();
            $table->string('nombre_via')->nullable();
            $table->string('cod_comuna_pac')->nullable();
            $table->integer('telefono1')->nullable();
            $table->integer('telefono2')->nullable();
            $table->string('cod_estab_der')->nullable();
            $table->string('cod_espec_der')->nullable();
            $table->string('ind_motivo')->nullable();
            $table->string('det_motivo_consulta')->nullable();
            $table->string('nom_hip_diag')->nullable();
            $table->string('cod_diag')->nullable();
            $table->string('ind_auge')->nullable();
            $table->string('nom_problem_auge')->nullable();
            $table->string('sub_problem_auge')->nullable();
            $table->string('nom_fund_diag')->nullable();
            $table->string('nom_examen')->nullable();
            $table->integer('cod_rut_prof')->nullable();
            $table->string('dv_rut_prof')->nullable();
            $table->string('nombre_prof')->nullable();
            $table->string('ape_pat_prof')->nullable();
            $table->string('ape_mat_prof')->nullable();
            $table->string('titulo_prof')->nullable();
            $table->string('ind_urgencia')->nullable();
            $table->integer('rut_titular')->nullable();
            $table->string('dig_ver_tit')->nullable();
            $table->string('nombre_tit')->nullable();
            $table->string('ape_pat_tit')->nullable();
            $table->string('ape_mat_tit')->nullable();
            $table->string('sistema_previsional')->nullable();
            $table->string('ind_previs')->nullable();
            $table->date('venc_prev')->nullable();
            $table->integer('num_fonasa')->nullable();
            $table->integer('rut_ins')->nullable();
            $table->integer('prais')->nullable();
            $table->string('nombre_social')->nullable();
            $table->string('nombre_tutor')->nullable();
            $table->string('email')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('etnia')->nullable();
            $table->string('estado_civil')->nullable();
            $table->foreignId('sic_status_id');
            $table->timestamps();

            $table->foreign('sic_status_id')->on('sic_statuses')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sics');
    }
}
