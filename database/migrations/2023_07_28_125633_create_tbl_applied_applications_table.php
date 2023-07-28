<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAppliedApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_applied_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of tbl_application_details');
            $table->longText('description')->nullable()->comment('Appeal description');
            $table->tinyInteger('confirmed')->default(0)->comment('0 pending 1 approve 2 rejected');
            $table->bigInteger('created_by')->nullable()->comment('PK of Exporter table');
            $table->bigInteger('updated_by')->nullable()->comment('PK of Users table');
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
        Schema::dropIfExists('tbl_applied_applications');
    }
}
