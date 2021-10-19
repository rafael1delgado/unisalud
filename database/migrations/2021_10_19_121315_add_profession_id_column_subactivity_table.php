<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfessionIdColumnSubactivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('mp_sub_activities', function (Blueprint $table) {
          $table->unsignedInteger('specialty_id')->nullable()->change();
          $table->unsignedInteger('profession_id')->nullable()->after('specialty_id');
          $table->foreign('profession_id')->references('id')->on('mp_professions');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('mp_sub_activities', function (Blueprint $table) {
        // mp_sub_activities_profession_id_foreign
          $table->dropForeign('mp_sub_activities_profession_id_foreign');
          $table->dropColumn('profession_id');
      });
    }
}
