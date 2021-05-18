<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('period', function (Blueprint $table) {
            $table->id();
            $table->foreignId('period_id')->nullable();
            $table->foreignId('appointment_id')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();

            $table->foreign('period_id')->references('id')->on('period');
            $table->foreign('appointment_id')->references('id')->on('appointment');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('period');
    }
}
