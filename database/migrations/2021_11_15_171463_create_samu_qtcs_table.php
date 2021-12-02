<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuQtcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_qtcs', function (Blueprint $table) {
            $table->id();
            
            $table->date('date');
            $table->integer('counter');
       
            /* llaves foraneas */
            $table->foreignId('shift_id')->constrained('samu_shifts');
            $table->foreignId('key_id')->nullable()->constrained('samu_keys');
            $table->foreignId('return_key_id')->nullable()->constrained('samu_keys');
            $table->foreignId('mobile_in_service_id')->nullable()->constrained('samu_mobiles_in_service');
            $table->foreignId('mobile_id')->nullable()->constrained('samu_mobiles');

            $table->time('departure_at')->nullable();
            $table->time('mobile_departure_at')->nullable();
            $table->time('mobile_arrival_at')->nullable();
            $table->time('route_to_healtcenter_at')->nullable();
            $table->time('healthcenter_at')->nullable();
            $table->time('patient_reception_at')->nullable();
            $table->time('return_base_at')->nullable();
            $table->time('on_base_at')->nullable();
            
            $table->text('observation')->nullable();

            /* Paciente */
            $table->boolean('patient_unknown')->nullable();
            $table->string('patient_identification')->nullable();
            $table->string('patient_name')->nullable();
            
            /* Recepción en centro asistencial */
            $table->text('reception_detail')->nullable();
            $table->foreignId('establishment_id')->nullable()->constrained('organizations');
            $table->string('reception_person')->nullable();
            /* Registro atención de urgencia */
            $table->string('rau')->nullable();


            /* Asignacion signos vitales */
            $table->integer('fc')->nullable();
            $table->integer('fr')->nullable();
            $table->string('pa')->nullable();
            $table->integer('pam')->nullable();
            $table->integer('gl')->nullable();
            $table->integer('soam')->nullable();
            $table->integer('soap')->nullable();
            $table->integer('hgt')->nullable();
            $table->integer('fill_capillary')->nullable();
            $table->integer('t')->nullable();
            
            $table->text('treatment')->nullable();
            $table->text('observation_sv')->nullable();

            $table->foreignId('creator_id')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('samu_call_qtc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('call_id')->constrained('samu_calls');
            $table->foreignId('qtc_id')->constrained('samu_qtcs');
        });

        Schema::create('samu_qtc_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qtc_id')->constrained('samu_qtcs');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('job_type_id')->constrained('samu_job_types');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samu_qtc_user');
        Schema::dropIfExists('samu_call_qtc');
        Schema::dropIfExists('samu_qtcs');
    }
}
