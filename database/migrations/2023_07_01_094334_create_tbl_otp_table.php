<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblOtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_otp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 200)->nullable()->comment('text');
            $table->integer('otp')->unsigned()->nullable()->comment('Max 8 digit otp');
            $table->boolean('is_verified')->nullable()->default(false)->comment('true: verified, false: not verified yet');
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
        Schema::dropIfExists('tbl_otp');
    }
}
