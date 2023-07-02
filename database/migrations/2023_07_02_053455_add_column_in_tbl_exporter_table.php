<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnInTblExporterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_exporters', function (Blueprint $table) {
            $table->string('appl_no', 500)->nullable()->unique()->comment('Application number for refferal')->after('id');
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
            $table->dropColumn('appl_no');
        });
    }
}
