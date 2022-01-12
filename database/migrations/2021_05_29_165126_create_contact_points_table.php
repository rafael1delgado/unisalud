<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_points', function (Blueprint $table) {
            $table->id();
            $table->enum('system', ['phone', 'fax', 'email', 'pager', 'url', 'sms', 'other',
            ])->nullable();
            $table->foreignId('contact_point_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('location_id')->nullable();
            $table->foreignId('emergency_contact_id')->nullable();
            $table->string('value')->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->enum('use', ['home', 'work', 'temp', 'old', 'mobile'])->nullable();
            $table->unsignedInteger('rank')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('contact_point_id')->references('id')->on('contact_points');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('emergency_contact_id')->references('id')->on('emergency_contacts');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('organization_id')->references('id')->on('organizations');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_points');
    }
}
