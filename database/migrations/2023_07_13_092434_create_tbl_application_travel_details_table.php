<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblApplicationTravelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_application_travel_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of tbl_application_details');
            $table->tinyInteger('destination_type')->nullable()->comment('Travel destination type 1: within india, 2: Outside India, so on');
            $table->string('traveller_name', 100)->nullable()->comment('Traveller name');
            $table->string('designation', 100)->nullable()->comment('Travellors designation');
            $table->tinyInteger('mode_of_travel')->nullable()->comment('1: Flight, 2: Train, so on');
            $table->string('class_of_travel', 100)->nullable()->comment('Class of traveL');
            $table->decimal('total_expense', 10, 3)->default(0.00)->comment('Total expense made for travel');
            $table->decimal('incentive_claimed', 10, 3)->default(0.00)->comment('Incentive claimed towards travel');
            $table->string('file_visa', 200)->nullable()->comment('Visa invitaion letter file');
            $table->string('file_ticket', 200)->nullable()->comment('Ticket of train/flight file');
            $table->string('file_boarding_pass', 200)->nullable()->comment('Boarding Pass during flight file');
            $table->boolean('status')->nullable()->default(false);
            $table->bigInteger('created_by')->nullable()->comment('PK of tbl_exporter table');
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
        Schema::dropIfExists('tbl_application_travel_details');
    }
}
