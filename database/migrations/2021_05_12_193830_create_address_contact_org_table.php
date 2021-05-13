<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressContactOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_contact_org', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_contact_org_id')->nullable();
            $table->enum('use',['home','work','temp','old','billing',
            ])->nullable();
            $table->enum('type',['postal','physical','both',
            ])->nullable();
            $table->string('text')->nullable();
            $table->string('line')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('state')->nullable();
            $table->string('postalCode')->nullable();
            $table->string('country')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('address_contact_org');
    }
}
