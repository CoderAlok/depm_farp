<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExporterAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_exporter_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('exporter_id')->nullable()->comment('PK of Exporter table');
            $table->string('address', 255)->nullable()->comment('Full address of exporter');
            $table->string('post', 100)->nullable()->comment('Postal address');
            $table->string('city', 100)->nullable()->comment('City name');
            $table->string('district', 100)->nullable()->comment('District name');
            $table->string('pincode', 100)->nullable()->comment('Pincode');
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
        Schema::dropIfExists('tbl_exporter_address');
    }
}
