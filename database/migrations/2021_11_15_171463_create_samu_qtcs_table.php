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
       
            /* llaves foraneas */
            $table->foreignId('shift_id')->constrained('samu_shifts');
            $table->foreignId('key_id')->nullable()->constrained('samu_keys');
            $table->foreignId('return_key_id')->nullable()->constrained('samu_keys');
            $table->foreignId('mobile_in_service_id')->nullable()->constrained('samu_mobiles_in_service');

            $table->time('departure_time')->nullable();
            $table->time('mobile_departure_time')->nullable();
            $table->time('mobile_arrival_place')->nullable();
            $table->time('route_ca')->nullable();
            $table->time('mobile_ca')->nullable();
            $table->time('patient_reception')->nullable();
            $table->time('return_base')->nullable();
            $table->time('mobile_base')->nullable();
            
            $table->text('observation')->nullable();
            
            
            /* Evaluación de paciente */

            $table->text('reception_detail')->nullable();
            $table->foreignId('establishment_id')->nullable()->constrained('organizations');
            $table->string('reception_person')->nullable();


            /* Asignacion signos vitales */
            
            $table->integer('fc')->nullable();
            $table->integer('fr')->nullable();
            $table->integer('pa')->nullable();
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
        
        Schema::create('samu_user_qtc', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('samu_users');
            $table->foreignId('qtc_id')->constrained('samu_qtcs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samu_call_qtc');
        Schema::dropIfExists('samu_qtcs');
    }
}
