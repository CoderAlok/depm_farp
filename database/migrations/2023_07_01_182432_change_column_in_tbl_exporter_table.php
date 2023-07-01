<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnInTblExporterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_exporter_address', function (Blueprint $table) {
            $table->integer('district')->unsigned()->nullable()->comment('PK of District table')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_exporter_address', function (Blueprint $table) {
            $table->string('district', 100)->nullable()->comment('District name')->change();
        });
    }
}
