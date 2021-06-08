<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFqMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fq_medicines', function (Blueprint $table) {
            $table->id();

            $table->foreignId('request_id');
            $table->foreignId('medicines_id');

            $table->foreign('request_id')->references('id')->on('fq_requests');
            $table->foreign('medicines_id')->references('id')->on('ext_medicines');

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
        Schema::dropIfExists('fq_medicines');
    }
}
