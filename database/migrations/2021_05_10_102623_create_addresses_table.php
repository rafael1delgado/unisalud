<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('period_id')->nullable();
            $table->enum('use',['home','work','temp','old','billing',
            ])->nullable();
            $table->enum('type',['postal','physical','both',
            ])->nullable();
            $table->string('text')->nullable();
            $table->string('line')->nullable();
            $table->string('apartment')->nullable();
            $table->string('suburb')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable(); /** should be deleted? */
            $table->string('state')->nullable(); /** should be deleted? */
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable(); /** should be deleted? */
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('period_id')->references('id')->on('periods');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
