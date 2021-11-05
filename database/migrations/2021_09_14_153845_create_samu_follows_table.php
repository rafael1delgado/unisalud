<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_follows', function (Blueprint $table) {
           //segumiento
            $table->id();
            //llave foranea
            $table->foreignId('qtc_id');
            $table->string('key')->nullable();;
            $table->string('key_return')->nullable();
            $table->string('mobile')->nullable();
            $table->string('transfer_type')->nullable();
            $table->time('departure_time')->nullable();
            $table->time('mobile_departure_time')->nullable();
            $table->time('mobile_arrival_place')->nullable();
            $table->time('route_ca')->nullable();
            $table->time('mobile_ca')->nullable();
            $table->time('patient_reception')->nullable();
            $table->time('return_base')->nullable();
            $table->time('mobile_base')->nullable();
            $table->text('observation')->nullable();
            
            
            //evaluación de paciente

            $table->text('reception_detail')->nullable();
            $table->string('establishment')->nullable();
            $table->string('reception_person')->nullable();


            //asignacion signos vitales
            
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
            $table->integer('treatment')->nullable();
            $table->integer('observation_sv')->nullable();

            //relacion llave foranea /nombre de la columna /nombre de la tabla
            $table->foreign('qtc_id')->references('id')->on('samu_qtcs');

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
        Schema::dropIfExists('samu_follows');
    }
}
