<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServiceOnContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('mp_contracts', function (Blueprint $table) {
          // $table->dropColumn('unit');
          // $table->dropColumn('unit_code');
          $table->unsignedBigInteger('service_id')->default(1)->after('user_id');
          $table->foreign('service_id')->references('id')->on('mp_services');
      });

      Schema::table('mp_services', function (Blueprint $table) {
          $table->string('service_code')->after('id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('mp_contracts', function (Blueprint $table) {
          $table->dropColumn('service_id');
      });

      Schema::table('mp_services', function (Blueprint $table) {
          $table->dropColumn('service_code');
      });
    }
}
