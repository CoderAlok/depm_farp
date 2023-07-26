<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOccurenceInTblComplaincTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_complaince', function (Blueprint $table) {
            $table->Integer('occurence')->unsigned()->nullable()->default(1)->comment('Number of time the application gets rejected')->after('id');
            $table->boolean('insert_status')->nullable()->default(false)->comment('Applications data will be resubmitted if status is true.')->after('exporters_remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_complaince', function (Blueprint $table) {
            $table->dropColumn('occurence');
            $table->dropColumn('insert_status');
        });
    }
}
