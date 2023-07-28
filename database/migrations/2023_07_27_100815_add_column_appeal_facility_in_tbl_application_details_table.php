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
            $table->tinyInteger('appeal_facility')->nullable()->default(0)->after('status')->comment('0 not approve, 1 Appeal can be done 2 appealed 3 Appeal approved 4 Appeal rejected');
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
