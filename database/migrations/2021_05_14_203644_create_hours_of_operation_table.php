<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoursOfOperationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours_of_operation', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hours_of_operation_id')->nullable();
            $table->foreignId('location_id')->nullable();
            $table->enum('daysOfWeek', ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun',
            ])->nullable();
            $table->boolean('allDay')->nullable();
            $table->time('openingTime')->nullable();
            $table->time('closingTime')->nullable();

            $table->foreign('hours_of_operation_id')->references('id')->on('hours_of_operation');
            $table->foreign('location_id')->references('id')->on('location');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hours_of_operation');
    }
}
