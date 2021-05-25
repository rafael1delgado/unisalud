<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFqContactUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fq_contact_users', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('run')->unique();
            $table->char('dv',1);
            $table->string('name');
            $table->string('fathers_family');
            $table->string('mothers_family')->nullable();

            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('telephone2')->nullable();
            $table->string('commune');
            $table->string('address');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fq_contact_users');
    }
}
