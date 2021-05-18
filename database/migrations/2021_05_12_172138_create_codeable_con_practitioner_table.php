<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeableConPractitionerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codeable_con_practitioner', function (Blueprint $table) {
            $table->id();
            $table->foreignId('codeable_con_practitioner_id')->nullable();
            $table->foreignId('coding_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('text');

            $table->foreign('codeable_con_practitioner_id')->references('id')->on('codeable_con_practitioner');
            $table->foreign('coding_id')->references('id')->on('coding');
            $table->foreign('user_id')->references('id')->on('users');  

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codeable_con_practitioner');
    }
}
