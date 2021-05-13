<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_point', function (Blueprint $table) {
            $table->id();
            $table->enum('system', ['phone', 'fax', 'email', 'pager', 'url', 'sms', 'other',
            ])->nullable();
            $table->foreignId('contact_point_id')->nullable();
            $table->string('value')->nullable();
            $table->enum('use', ['home', 'work', 'temp', 'old', 'mobile'])->nullable();
            $table->unsignedInteger('rank')->nullable();
            $table->timestamps();

            $table->foreign('contact_point_id')->references('id')->on('contact_point');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_point');
    }
}
