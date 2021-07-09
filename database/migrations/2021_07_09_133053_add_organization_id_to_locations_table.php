<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrganizationIdToLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['cod_con_organization_id']);
            $table->dropColumn('cod_con_organization_id');

            $table->foreignId('organization_id')->nullable()->after('altitude');
            $table->foreign('organization_id')->references('id')->on('organizations');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->foreignId('cod_con_organization_id')->nullable()->after('altitude');
            $table->foreign('cod_con_organization_id')->references('id')->on('cod_con_organizations');

            $table->dropForeign(['organization_id']);
            $table->dropColumn('organization_id');

            $table->dropSoftDeletes();
        });
    }
}
