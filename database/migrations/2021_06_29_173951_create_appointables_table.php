<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['practitioner_id']);
//            ]);
        });
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('practitioner_id');
        });

        Schema::create('appointables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id');
            $table->integer('appointable_id');
            $table->string('appointable_type');
            $table->timestamps();

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
        Schema::table('appointments', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable();
            $table->foreignId('practitioner_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('practitioner_id')->references('id')->on('practitioners');
        });

        Schema::dropIfExists('appointables');
    }
}
