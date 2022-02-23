<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuGpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_gps', function (Blueprint $table) {
            $table->id();
            $table->string('lat');
            $table->string('lon');
            $table->string('desc')->nullable();
            $table->string('sat')->nullable();
            $table->string('alt')->nullable();
            $table->string('spd')->nullable();
            $table->string('time')->nullable();
            $table->string('batt')->nullable();
            $table->string('aid')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samu_gps');
    }
}
