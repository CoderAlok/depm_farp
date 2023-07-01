<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExporterRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_exporter_remarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('exporter_id')->nullable()->comment('PK of tbl_exporters');
            $table->tinyInteger('type')->default(0)->nullable()->comment('0: Registration approval, vice versa');
            $table->string('remarks', 100)->nullable()->comment('text');
            $table->boolean('status')->nullable()->default(false)->comment('active / inactive');
            $table->bigInteger('created_by')->nullable()->comment('PK of User table');
            $table->bigInteger('updated_by')->nullable()->comment('PK of User table');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_exporter_remarks');
    }
}
