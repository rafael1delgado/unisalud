<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->nullable();
            $table->foreignId('identifiers_id')->nullable();
            $table->enum('status', ['proposed', 'pending', 'booked', 'arrived', 'fulfilled', 'cancelled', 'noshow', 'entered-in-error', 'checked-in', 'waitlist',
            ])->nullable();
            /** Add 6 cod con and reason code/reason */
            $table->foreignId('cod_con_cancelation_reason_id')->nullable();
            $table->foreignId('cod_con_appointment_type_id')->nullable();
            $table->unsignedInteger('priority')->nullable();
            $table->string('description')->nullable();
            $table->dateTime('start')->nullable(); /** time that starts the appointment */
            $table->dateTime('created')->nullable(); /** time that the appointment was created */
            $table->string('patientInstruction')->nullable();
            // tiene un periodo pero 0..*
            $table->timestamps();

            $table->foreign('appointment_id')->references('id')->on('appointment');
            $table->foreign('identifiers_id')->references('id')->on('identifiers');
            $table->foreign('cod_con_cancelation_reason_id')->references('id')->on('cod_con_cancelation_reason');
            $table->foreign('cod_con_appointment_type_id')->references('id')->on('cod_con_appointment_type');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
}
