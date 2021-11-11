<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SamuJobTypeChangeType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('samu_shift_user', function (Blueprint $table) {
            $table->dropColumn('job_type');
            $table->foreignId('job_type_id')->after('user_id')->constrained('samu_job_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* TODO: checkear que esto funcion */
        Schema::table('samu_shift_user', function (Blueprint $table) {
            $table->string('job_type');
            $table->dropForeign('job_type_id');
        });
    }
}
