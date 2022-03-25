<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SamuVitalSigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_vital_signs', function (Blueprint $table) {
            $table->id();

            $table->string('fc', 10)->nullable();
            $table->integer('fr')->nullable();
            $table->string('pa')->nullable();
            $table->string('pam')->nullable();
            $table->integer('gl')->nullable();
            $table->integer('soam')->nullable();
            $table->integer('soap')->nullable();
            $table->integer('hgt')->nullable();
            $table->integer('fill_capillary')->nullable();
            $table->decimal('t', 5, 2)->nullable();
            $table->datetime('registered_at')->nullable();

            $table->foreignId('event_id')->nullable()->constrained('samu_events');

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
        Schema::dropIfExists('samu_vital_signs');
    }
}
