<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTravelFromTblApplicationTravelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_application_travel_details', function (Blueprint $table) {
            $table->string('travel_from', 100)->nullable()->comment('Travel from ')->after('traveller_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_application_travel_details', function (Blueprint $table) {
            $table->dropColumn('travel_from');
        });
    }
}
