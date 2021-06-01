<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_reasons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_reason_id')->nullable();
            $table->foreignId('coding_id')->nullable();
            $table->foreignId('appointment_id')->nullable();
            $table->string('text');

            $table->foreign('appointment_reason_id')->references('id')->on('appointment_reasons');
            $table->foreign('coding_id')->references('id')->on('codings');   
            $table->foreign('appointment_id')->references('id')->on('appointments');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_reason');
    }
}
