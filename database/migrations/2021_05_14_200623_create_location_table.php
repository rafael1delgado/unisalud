<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['active', 'suspended', 'inactive',
            ])->nullable(); /**code() Technically, a code is restricted to a string which has at least one character and no leading or trailing whitespace, and where there is no whitespace other than single spaces in the contents*/
            $table->foreignId('coding_id')->nullable();
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->string('description')->nullable();
            $table->string('mode')->nullable();
            $table->foreignId('cod_con_location_id')->nullable(); /** Localidad [norte, sur, centro...] parte física de la ubicación */
            $table->foreignId('contact_point_id')->nullable();
            $table->foreignId('address_id')->nullable();
            $table->foreignId('cod_con_physical_type_id')->nullable(); /**site,building,wing,ward,leve,corridor,room,bed,vehicle,house,cabinet,road,area,jurisdiction */
            $table->foreignId('codeable_con_organization_id')->nullable(); /** Refers to the organization responsible for provisioning and upkeep */
            $table->foreignId('hours_of_operation_id')->nullable(); /** Refers to the organization responsible for provisioning and upkeep */
            $table->string('AvailabilityExceptions')->nullable();

            $table->string('name')->nullable();

            $table->timestamps();

            $table->foreign('coding_id')->references('id')->on('coding');
            $table->foreign('cod_con_location_id')->references('id')->on('cod_con_location');
            $table->foreign('contact_point_id')->references('id')->on('contact_point');
            $table->foreign('address_id')->references('id')->on('address');
            $table->foreign('cod_con_physical_type_id')->references('id')->on('cod_con_physical_type');
            $table->foreign('codeable_con_organization_id')->references('id')->on('codeable_con_organization');
            $table->foreign('hours_of_operation_id')->references('id')->on('hours_of_operation');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('location');
    }
}
