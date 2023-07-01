<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_district', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('state_id')->nullable()->comment('PK of state table.');
            $table->string('name', 100)->nullable()->comment('District name');
            $table->string('code', 100)->nullable()->comment('District Code');
            $table->boolean('status')->nullable()->default(false)->comment('Active / Inactive');
            $table->bigInteger('created_by')->nullable()->comment(12);
            $table->bigInteger('updated_by')->nullable()->comment(12);
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
        Schema::dropIfExists('tbl_district');
    }
}
