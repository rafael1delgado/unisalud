<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObservationsToSicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sics', function (Blueprint $table) {
            $table->string('diagnostic_hypothesis')->after('patient_marital_status')->nullable();
            $table->string('origin_observation')->after('diagnostic_hypothesis')->nullable();
            $table->string('rejected_observation')->after('origin_observation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sics', function (Blueprint $table) {
            $table->dropColumn('diagnostic_hypothesis');
            $table->dropColumn('origin_observation');
            $table->dropColumn('rejected_observation');
            
        });
    }
}
