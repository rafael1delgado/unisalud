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
            $table->foreignId('call_id')->nullable()->constrained('samu_calls');
            $table->string('classification')->nullable();
            $table->datetime('hour');
            $table->foreignId('receptor_id')->constrained('users');
            $table->foreignId('clasificator_id')->nullable()->constrained('users');
            $table->foreignId('regulator_id')->nullable()->constrained('users');
            $table->text('information')->nullable();
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
