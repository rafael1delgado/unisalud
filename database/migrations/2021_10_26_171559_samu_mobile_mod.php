<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class SamuMobileMod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('samu_code_mobiles', 'samu_mobiles');

        Schema::table('samu_mobiles', function (Blueprint $table) {
            $table->renameColumn('mobile_code','code');
            $table->renameColumn('name_mobile_code','name');
            $table->string('plate')->nullable()->after('name_mobile_code');
            $table->string('type')->nullable()->after('plate');
            $table->boolean('managed')->after('type');
            $table->string('description')->nullable()->after('managed');
            $table->boolean('status')->default(true)->after('description');
            //$table->foreignId('job_type_id')->after('user_id')->constrained('samu_job_types');

            /* Permite utilizar softdelete */
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
        Schema::table('samu_mobiles', function (Blueprint $table) {
            $table->renameColumn('code','mobile_code');
            $table->renameColumn('name','name_mobile_code');
            $table->dropColumn('plate');
            $table->dropColumn('type');
            $table->dropColumn('managed');
            $table->dropColumn('description');
            $table->dropColumn('status');
            $table->dropColumn('deleted_at');
            //$table->foreignId('job_type_id')->after('user_id')->constrained('samu_job_types');
        });

        Schema::rename('samu_mobiles','samu_code_mobiles');
    }
}
