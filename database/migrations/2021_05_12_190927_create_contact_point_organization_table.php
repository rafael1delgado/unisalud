<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPointOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_point_organization', function (Blueprint $table) {
            $table->id();   
            $table->foreignId('contact_point_organization_id')->nullable();
            $table->enum('system', ['phone', 'fax', 'email', 'pager', 'url', 'sms', 'other',
            ])->nullable();
            $table->string('value')->nullable();
            $table->enum('use', ['home', 'work', 'temp', 'old', 'mobile'])->nullable();
            $table->unsignedInteger('rank')->nullable();
            $table->timestamps();

            $table->foreign('contact_point_organization_id')->references('id')->on('contact_point_organization');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_point_organization');
    }
}
