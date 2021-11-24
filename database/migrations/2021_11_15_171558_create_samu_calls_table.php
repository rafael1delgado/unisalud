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
            $table->foreignId('qtc_id')->nullable()->constrained('samu_qtcs');
            $table->foreignId('ot_id')->nullable()->constrained('samu_ots');
            $table->string('classification')->nullable();
            $table->time('hour');
            $table->string('call_reception');
            $table->text('telephone_information')->nullable();
            $table->string('applicant')->nullable();
            $table->string('address')->nullable();
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
