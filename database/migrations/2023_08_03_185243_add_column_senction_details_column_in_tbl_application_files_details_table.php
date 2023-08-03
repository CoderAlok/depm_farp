<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSenctionDetailsColumnInTblApplicationFilesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_application_files_details', function (Blueprint $table) {
            $table->string('payment_order_attachment', 100)->nullable()->default(null)->after('tour_dairy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_application_files_details', function (Blueprint $table) {
            $table->dropColumn('payment_order_attachment');
        });
    }
}
