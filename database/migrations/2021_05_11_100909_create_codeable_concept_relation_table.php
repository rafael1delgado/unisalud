<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeableConceptRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codeable_concept_relation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('codeable_concept_relation_id')->nullable();
            $table->foreignId('coding_id')->nullable();
            $table->string('text');

            $table->foreign('codeable_concept_relation_id')->references('id')->on('codeable_concept_relation');
            $table->foreign('coding_id')->references('id')->on('coding');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codeable_concept_relationship');
    }
}
