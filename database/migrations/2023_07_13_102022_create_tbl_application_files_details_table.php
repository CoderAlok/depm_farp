<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblApplicationFilesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_application_files_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of tbl_application_details');
            $table->string('iec_file', 255)->nullable()->comment('Import/Export certificate file name');
            $table->string('cancelled_cheque_file', 255)->nullable()->comment('Bank cancelled cheque file name');
            $table->string('file_visa', 255)->nullable()->comment('Visa file name');
            $table->string('file_ticket', 255)->nullable()->comment('Ticket file name');
            $table->string('file_boarding_pass', 255)->nullable()->comment('Boarding pass file name');
            $table->string('stall_allot_letter', 255)->nullable()->comment('Stall allotment pass letter file name');
            $table->string('stall_reg_pay_recipt', 255)->nullable()->comment('Stall registration payment reciept file name');
            $table->string('certi_payment_reciept_file')->nullable()->comment('Only fillable accept scheme 1: certificates payment file');
            $table->string('tour_dairy', 255)->nullable()->comment('Tour Dairy file name');
            $table->boolean('status')->nullable()->default(false);
            $table->bigInteger('created_by')->nullable()->comment('PK of tbl_exporter');
            $table->bigInteger('updated_by')->nullable()->comment('PK of user');
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
        Schema::dropIfExists('tbl_application_files_details');
    }
}
