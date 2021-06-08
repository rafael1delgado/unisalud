<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpSubActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mp_sub_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('specialty_id');
            $table->unsignedInteger('activity_id');
            $table->string('sub_activity_abbreviated')->nullable();
            $table->string('sub_activity_name')->nullable();
            $table->string('sub_activity_description')->nullable();
            $table->decimal('performance', 8, 2)->nullable();

            $table->foreign('specialty_id')->references('id')->on('mp_specialties');
            $table->foreign('activity_id')->references('id')->on('mp_activities');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('mp_theoretical_programming', function (Blueprint $table) {
            $table->string('sub_activity_id')->after('activity_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mp_sub_activities');

        Schema::table('mp_theoretical_programming', function (Blueprint $table) {
            $table->dropColumn('sub_activity_id');
        });
    }
}
