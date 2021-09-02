<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProposalDetailIdToAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('appointments', function (Blueprint $table) {
        //     //
        // });

        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedBigInteger('mp_prog_prop_detail_id')->after('patientInstruction')->nullable();
            $table->foreign('mp_prog_prop_detail_id')->references('id')->on('mp_programming_proposals_detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('appointments', function (Blueprint $table) {
        //     //
        // });

        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign('appointments_mp_prog_prop_detail_id_foreign');
            $table->dropColumn('mp_prog_prop_detail_id');
        });
    }
}
