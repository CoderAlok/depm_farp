<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_exporters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('role_id')->unsigned()->nullable()->comment('PK of roles table 6: Merchant, 7: Manufacturer');
            $table->integer('category_id')->unsigned()->nullable()->comment('PK of tbl_category table');
            $table->string('name', 255)->nullable()->comment('Name of exporters');
            $table->string('chief_ex_name', 255)->nullable()->comment('Name of exporters cheif executive');
            $table->string('email', 100)->nullable()->comment('Email of exporters');
            $table->string('username', 100)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('gender', 20)->nullable()->comment('Exporters respective genders');
            $table->bigInteger('address_id')->nullable()->comment('PK of tbl_exporter_address table');
            $table->bigInteger('bank_id')->nullable()->comment('PK of tbl_exporter_bank_details table');
            $table->bigInteger('other_code_id')->nullable()->comment('PK of tbl_exporter_other_code table');
            $table->tinyInteger('regsitration_status')->nullable()->comment('PK of status table');
            $table->bigInteger('created_by')->nullable()->comment('PK of current table');
            $table->bigInteger('updated_by')->nullable()->comment('PK of user table');
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
        Schema::dropIfExists('tbl_exporters');
    }
}
