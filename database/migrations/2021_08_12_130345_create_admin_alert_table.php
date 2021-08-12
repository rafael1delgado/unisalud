<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAlertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_alert', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_alert_id')->nullable();
            $table->string('name')->nullable();
            $table->foreignId('user_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('admin_alert_id')->references('id')->on('admin_alert');

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
        Schema::dropIfExists('admin_alert');
    }
}
