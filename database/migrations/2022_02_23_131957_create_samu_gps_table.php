<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamuGpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samu_gps', function (Blueprint $table) {
            $table->id();

            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 10, 8)->nullable();
            $table->decimal('altitude', 10, 8)->nullable();

            $table->string('anotation')->nullable();
            $table->string('satelite')->nullable();
            $table->string('speed')->nullable();
            $table->string('precision')->nullable();
            $table->string('address')->nullable();
            $table->string('operator')->nullable();

            $table->time('hour_start')->nullable();
            $table->time('hour_utc')->nullable();

            $table->timestamp('date_diff')->nullable();
            $table->timestamp('date')->nullable();

            $table->string('battery')->nullable();
            $table->string('charging')->nullable();
            $table->string('android_id')->nullable();
            $table->string('serial')->nullable();
            $table->string('file')->nullable();
            $table->string('profile')->nullable();
            $table->string('hdop')->nullable();
            $table->string('vdop')->nullable();
            $table->string('pdop')->nullable();
            $table->string('travel')->nullable();

            $table->foreignId('mobile_id')
                ->nullable()
                ->constrained('samu_mobiles');

            $table->softDeletes();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('samu_gps');
    }
}
