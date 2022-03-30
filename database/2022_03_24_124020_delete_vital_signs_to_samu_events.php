<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteVitalSignsToSamuEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('samu_events', function (Blueprint $table) {
        //     $table->dropColumn(['fc', 'fr', 'pa', 'pam', 'gl', 'soam', 'soap', 'hgt', 'fill_capillary', 't']);
        // });
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
