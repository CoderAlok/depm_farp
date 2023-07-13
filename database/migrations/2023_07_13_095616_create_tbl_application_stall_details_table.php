<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblApplicationStallDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_application_stall_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of tbl_application_details');
            $table->bigInteger('event_id')->nullable()->comment('PK of event_table');
            $table->decimal('total_cost', 10, 2)->nullable()->default(0.00)->comment('Total stall registration cost');
            $table->decimal('claimed_cost', 10, 2)->nullable()->default(0.00)->comment('Incentive claimed towards Stall registration');
            $table->string('stall_allot_letter', 255)->nullable()->comment('Upload Stall Allotment / Registration Letter');
            $table->string('stall_reg_pay_recipt', 255)->nullable()->comment('Upload Stall Registration payment reciept');
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
        Schema::dropIfExists('tbl_application_stall_details');
    }
}
