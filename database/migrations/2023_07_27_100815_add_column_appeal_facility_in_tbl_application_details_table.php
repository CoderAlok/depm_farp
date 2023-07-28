<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAppealFacilityInTblApplicationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_application_details', function (Blueprint $table) {
            $table->boolean('appeal_facility')->nullable()->default(false)->after('status')->comment('Application can be reapplied after rejection through Department secretory. And, can be reapplied only within 60days.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_application_details', function (Blueprint $table) {
            $table->dropColumn('appeal_facility');
        });
    }
}
