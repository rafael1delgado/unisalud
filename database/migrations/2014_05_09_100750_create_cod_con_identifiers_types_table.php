<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodConIdentifiersTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_con_identifier_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cod_con_identifier_type_id')->nullable();
            $table->foreignId('coding_id')->nullable();
            $table->string('text')->nullable();;

            $table->foreign('cod_con_identifier_type_id')->references('id')->on('cod_con_identifier_types');
            $table->foreign('coding_id')->references('id')->on('codings');
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
        Schema::dropIfExists('cod_con_identifier_types');
    }
}
