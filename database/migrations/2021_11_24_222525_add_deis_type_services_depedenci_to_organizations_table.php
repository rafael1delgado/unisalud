<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeisTypeServicesDepedenciToOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizations', function (Blueprint $table) {
            //
            $table->foreignId('type')->after('active')->nullable();
            $table->integer('code_deis')->after('type')->nullable(); //NUEVO codigo deis, se dejará de utilizar el antiguo
            $table->foreignId('service')->after('code_deis')->nullable();
            $table->foreignId('dependency')->after('service')->nullable();


            $table->foreign('type')->references('id')->on('organization_types');
            $table->foreign('service')->references('id')->on('organization_services');
            $table->foreign('dependency')->references('id')->on('organization_dependencies');

            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizations', function (Blueprint $table) {
            //
            $table->dropColumn('type');
            $table->dropColumn('code_deis');
            $table->dropColumn('service');
            $table->dropColumn('dependency');

        });
    }
}
