<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communication', function (Blueprint $table) {
            $table->id();
            $table->foreignId('communication_id')->nullable();
            $table->foreignId('codeable_concept_languaje_id')->nullable(); /** lenguaje */
            $table->boolean('preferred')->nullable();

            $table->timestamps();

            $table->foreign('communication_id')->references('id')->on('communication');
            $table->foreign('codeable_concept_languaje_id')->references('id')->on('codeable_concept_languaje');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('communication');
    }
}
