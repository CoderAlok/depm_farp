<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTblExportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_exporters', function (Blueprint $table) {
            $table->tinyInteger('track_status')->nullable()->default(0)->after('regsitration_status')->comment('0: Reset password is mendatory, 1: Account is active. But, After 45days status will again change into 0');
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
            $table->dropColumn('track_status');
        });
    }
}
