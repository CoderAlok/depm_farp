<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblApplicationLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_application_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of tbl_application_details ');
            $table->tinyInteger('from_user_type')->comment('1 => Exporter , 2 => Users');
            $table->bigInteger('from_user')->nullable()->comment('User from User/Exporter table');
            $table->tinyInteger('to_user_type')->comment('1 => Exporter , 2 => Users');
            $table->bigInteger('to_user')->nullable()->comment('User from User/Exporter table');
            $table->tinyInteger('status')->comment('1: Applied, 2: Verified by SO, 3: , 4: approved by dir depm, 5: Not verified by dir depm, 6: Verified by Addl, 7: Not verified by Add, 8: Approved by Department Secretory,9: Rejected by Department Secretory');
            $table->text('remarks')->nullable()->comment('Remarks for that application by that user');
            $table->dateTime('updated_date')->nullable()->comment('Application updation date');
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
        Schema::dropIfExists('tbl_application_log');
    }
}
