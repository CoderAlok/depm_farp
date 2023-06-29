<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExporterOtherCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_exporter_other_code', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('exporter_id')->nullable()->comment('PK of Exporter table');
            $table->string('iec', 100)->nullable()->comment('Import Export Code');
            $table->string('rcmc', 100)->nullable()->comment('RCMC NO: REGISTRATION-CUM-MEMBERSHIP CERTIFICATE');
            $table->string('epc', 255)->nullable()->comment('Name of EPC(Export promotion council)');
            $table->string('urn', 100)->nullable()->comment('Udayam Registration No');
            $table->string('hsm', 100)->nullable()->comment('Harmonized System of Nomenclature');
            $table->tinyInteger('status')->default(0)->comment('0: Inactive, 1: Active');
            $table->bigInteger('created_by')->nullable()->comment('PK of Exporter table');
            $table->bigInteger('updated_by')->nullable()->comment('PK of User table role:Publicity');
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
        Schema::dropIfExists('tbl_exporter_other_code');
    }
}
