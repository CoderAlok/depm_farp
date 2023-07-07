<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnExporterTypeInTblExportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_exporters', function (Blueprint $table) {
            $table->tinyInteger('type')->nullable()->comment('0: Merchant, 1:Manufacturer')->after('app_count_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_exporters', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
