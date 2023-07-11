<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnColorInTblSchemeMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_scheme_master', function (Blueprint $table) {
            $table->string('color', 20)->nullable()->default('#ffffff')->after('logo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_scheme_master', function (Blueprint $table) {
            $table->dropColumn('color');
        });
    }
}
