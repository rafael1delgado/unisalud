<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHumannamesUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('text')->nullable()->after('active');

            $table->string('given')->nullable()->after('text');
            $table->string('fathers_family')->nullable()->after('given');
            $table->string('mothers_family')->nullable()->after('fathers_family');

            $table->timestamp('email_verified_at')->nullable()->after('fhir_id');
        });
        
        Schema::table('human_names', function (Blueprint $table) {
            $table->string('given')->nullable()->after('text');

            $table->datetime('period_start')->after('suffix')->default('1800-01-01 00:00:00');
            $table->datetime('period_end')->after('period_start')->default('1800-01-01 00:00:00');

            /* TODO update period_start desde created_at */
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('text');
            $table->dropColumn('given');
            $table->dropColumn('fathers_family');
            $table->dropColumn('mothers_family');

            $table->dropColumn('email_verified_at');
        });

        Schema::table('human_names', function (Blueprint $table) {
            $table->dropColumn('given');

            $table->dropColumn('period_start');
            $table->dropColumn('period_end');
        });
    }
}
