<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_calls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shift_id')->constrained('samu_shifts');
            $table->string('class_call');
            $table->time('hour');
            $table->string('call_reception');
            $table->text('telephone_information')->nullable();
            $table->string('applicant')->nullable();
            $table->string('direction')->nullable();
            $table->string('telephone')->nullable();
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
        Schema::dropIfExists('samu_calls');
    }
}
