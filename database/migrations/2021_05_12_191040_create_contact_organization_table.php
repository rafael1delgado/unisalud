<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_organization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_organization_id')->nullable();
            $table->foreignId('codCon_contact_org_id')->nullable();
            $table->foreignId('humanName_contact_org_id')->nullable();
            $table->foreignId('contactP_contact_org_id')->nullable();
            $table->foreignId('address_contact_org_id')->nullable();

            $table->foreign('contact_organization_id')->references('id')->on('contact_organization');
            $table->foreign('humanName_contact_org_id')->references('id')->on('humanName_contact_org');
            $table->foreign('codCon_contact_org__id')->references('id')->on('codCon_contact_org_');
            $table->foreign('contactP_contact_org_id')->references('id')->on('contactP_contact_org');
            $table->foreign('address_contact_org_id')->references('id')->on('address_contact_org');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_organization');
    }
}
