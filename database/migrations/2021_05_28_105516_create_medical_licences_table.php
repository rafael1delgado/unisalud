<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalLicencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        //inicio
        Schema::create('medical_licences', function (Blueprint $table) {
            $table->id();
            $table->string("n_dias");
            $table->string("tipo_licencia");
            $table->string("tipo_reposo");
            $table->string("lugar_reposo");
            $table->string("reposo_parcial");
            $table->date("fecha_inicio_reposo");
            $table->timestamps();
            $table->softDeletes();//para softdelte
        });
        //fin
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_licences');
    }
}
