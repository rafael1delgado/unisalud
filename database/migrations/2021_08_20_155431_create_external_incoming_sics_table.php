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
            $table->integer('pciNumSic')->nullable();
            $table->integer('pciNumSicGes')->nullable();
            $table->date('pcdFechaSolic')->nullable();
            $table->string('pcsHoraSolic')->nullable();
            $table->date('pcsFechaDigitacion')->nullable();
            $table->string('pcsHoraDigitacion')->nullable();
            $table->string('pcsCodSSalud')->nullable();
            $table->string('pcsCodEstab')->nullable();
            $table->string('pcsCodEspec')->nullable();
            $table->string('pcsNombrePac')->nullable();
            $table->string('pcsApellidoPat')->nullable();
            $table->string('pcsApellidoMat')->nullable();
            $table->integer('pciTipoDocumento')->nullable();
            $table->integer('pciRutPac')->nullable();
            $table->string('pcsDigVerPac')->nullable();
            $table->string('pcsNumDocumento')->nullable();
            $table->string('pcsIndSexoPac')->nullable();
            $table->date('pcdFechNacPac')->nullable();
            $table->string('pcsDomicilioPac')->nullable();
            $table->string('pcsTipoVia')->nullable();
            $table->string('pcsNombreVia')->nullable();
            $table->string('pcsCodComunaPac')->nullable();
            $table->integer('pciTelefono1')->nullable();
            $table->integer('pciTelefono2')->nullable();
            $table->string('pcsCodEstabDer')->nullable();
            $table->string('pcsCodEspecDer')->nullable();
            $table->integer('pciIndMotivo')->nullable();
            $table->string('pcsDetMotivoConsulta')->nullable();
            $table->string('pcsNomHipDiag')->nullable();
            $table->string('pcsCodDiag')->nullable();
            $table->string('pcsIndAuge')->nullable();
            $table->string('pcsNomProblemAuge')->nullable();
            $table->string('pcsSubProblemAuge')->nullable();
            $table->string('pcsNomFundDiag')->nullable();
            $table->string('pcsNomExamen')->nullable();
            $table->integer('pciCodRutProf')->nullable();
            $table->string('pcsDvRutProf')->nullable();
            $table->string('pcsNombreProf')->nullable();
            $table->string('pcsApePatProf')->nullable();
            $table->string('pcsApeMatProf')->nullable();
            $table->string('pcsTituloProf')->nullable();
            $table->string('pcsIndUrgencia')->nullable();
            $table->integer('pciRutTitular')->nullable();
            $table->string('pcsDigVerTit')->nullable();
            $table->string('pcsNombreTit')->nullable();
            $table->string('pcsApePatTit')->nullable();
            $table->string('pcsApeMatTit')->nullable();
            $table->string('pcsSistemaPrevisional')->nullable();
            $table->string('pcsIndPrevis')->nullable();
            $table->date('pcdVencPrev')->nullable();
            $table->integer('pciNumFonasa')->nullable();
            $table->integer('pciRutIns')->nullable();
            $table->integer('pciPrais')->nullable();
            $table->string('pcsNombreSocial')->nullable();
            $table->string('pcsNombreTutor')->nullable();
            $table->string('pcsEmail')->nullable();
            $table->string('pcsNacionalidad')->nullable();
            $table->string('pcsEtnia')->nullable();
            $table->string('pcsEstadoCivil')->nullable();

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
