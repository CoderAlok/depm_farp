<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblApplicationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_application_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('app_no', 500)->nullable()->unique()->comment('Application number for refferal');
            $table->string('app_count_no', 500)->nullable()->unique()->comment('Application number count');
            $table->integer('scheme_id')->unsigned()->nullable()->comment('PK of tbl_scheme_master');
            $table->bigInteger('exporter_id')->nullable()->comment('PK of tbl_exporter_table');
            $table->text('meeting_details')->nullable()->comment('Details of B2B / B2C meeteing held');
            $table->text('participation_details')->nullable()->comment('Details of Participation of event such as Sale of Products, Business deals made etc');
            $table->text('certi_type')->nullable()->comment('Only fillable accept scheme 1: certifaicate type');
            $table->text('certi_name')->nullable()->comment('Only fillable accept scheme 1: certificates name');
            $table->text('certi_iss_auth')->nullable()->comment('Only fillable accept scheme 1: certificates issueing authority');
            $table->decimal('certi_cost', 10, 2)->nullable()->default(0.00)->comment('Only fillable accept scheme 1: Cost of certificate');
            $table->string('certi_payment_reciept_file')->nullable()->comment('Only fillable accept scheme 1: certificates payment file');
            $table->boolean('confirmed')->nullable()->default(false)->comment('Term agreed or not');
            $table->tinyInteger('status');
            $table->bigInteger('created_by')->nullable()->comment('PK of tbl_exporter table');
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
        Schema::dropIfExists('tbl_application_details');
    }
}
