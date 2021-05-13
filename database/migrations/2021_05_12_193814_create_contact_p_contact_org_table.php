<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPContactOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_p_contact_org', function (Blueprint $table) {
            $table->foreignId('contact_p_contact_org_id')->nullable();
            $table->enum('system', ['phone', 'fax', 'email', 'pager', 'url', 'sms', 'other',
            ])->nullable();
            $table->string('value')->nullable();
            $table->enum('use', ['home', 'work', 'temp', 'old', 'mobile'])->nullable();
            $table->unsignedInteger('rank')->nullable();
            $table->timestamps();

            $table->foreign('contact_p_contact_org_id')->references('id')->on('contact_p_contact_org');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_p_contact_org');
    }
}
