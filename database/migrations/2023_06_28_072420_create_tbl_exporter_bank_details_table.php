<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExporterBankDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_exporter_bank_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('exporter_id')->nullable()->comment('PK of Exporter table');
            $table->string('name', 100)->nullable()->comment('Name of the bank');
            $table->string('account_no', 100)->nullable()->comment('Banks account number');
            $table->string('ifsc', 100)->nullable()->comment('Banks IFSC Code');
            $table->string('cheque_img', 100)->nullable()->comment('Cheque image file name');
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
        Schema::dropIfExists('tbl_exporter_bank_details');
    }
}
