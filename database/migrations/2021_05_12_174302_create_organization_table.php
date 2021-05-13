<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_id')->nullable();
            $table->string('identifier')->nullable();
            $table->boolean('active')->nullable();
            $table->foreignId('codeable_con_organization_id')->nullable();
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->foreignId('contact_point_organization_id')->nullable(); /** contact of the organization  */
            $table->foreignId('address_organization_id')->nullable(); 
            $table->string('partOf')->nullable(); /** the organization is part of... */
            $table->foreignId('contact_organization_id')->nullable();/** emergency contact of the organization  */

            $table->timestamps();
            $table->foreign('contact_point_organization_id')->references('id')->on('contact_point');
            $table->foreign('codeable_con_organization_id')->references('id')->on('codeable_con_organization');
            $table->foreign('contact_point_organization_id')->references('id')->on('contact_point_organization');
            $table->foreign('address_organization_id')->references('id')->on('address_organization');
            $table->foreign('contact_organization_id')->references('id')->on('contact_organization');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization');
    }
}
