<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsSamuMobilesInService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('samu_mobiles_in_service', function (Blueprint $table) {
            $table->datetime('lunch_break_start_at')->after('lunch_start_at')->nullable();
            $table->datetime('lunch_break_end_at')->after('lunch_break_start_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
