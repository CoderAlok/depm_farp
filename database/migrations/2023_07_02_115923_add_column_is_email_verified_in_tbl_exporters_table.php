<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIsEmailVerifiedInTblExportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_exporters', function (Blueprint $table) {
            $table->boolean('is_email_verified')->nullable()->default(false)->after('regsitration_status');
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
            $table->dropColumn('is_email_verified');
        });
    }
}
