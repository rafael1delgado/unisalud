<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewbornWeekToEpiSuspectCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('epi_suspect_cases', function (Blueprint $table) {
            //
            $table->unsignedSmallInteger('newborn_week')->nullable()->after('research_group');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('epi_suspect_cases', function (Blueprint $table) {
            //
            $table->dropColumn('newborn_week');
        });
    }
}
