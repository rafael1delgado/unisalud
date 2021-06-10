<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodConCommunicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_con_communications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cod_con_communication_id')->nullable();
            $table->foreignId('coding_id')->nullable();
            $table->foreignId('practitioner_id')->nullable();
            $table->string('text');

            $table->foreign('cod_con_communication_id')->references('id')->on('cod_con_communications');
            $table->foreign('coding_id')->references('id')->on('codings');
            $table->foreign('practitioner_id')->references('id')->on('practitioners');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cod_con_communication');
    }
}
