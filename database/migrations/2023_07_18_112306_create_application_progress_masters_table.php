<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationProgressMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_progress_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of Application table');
            $table->decimal('total_expense', 10, 2)->nullable()->default(0.00)->comment('Total expense amount by respective officer');
            $table->decimal('incentive_amount', 10, 2)->nullable()->default(0.00)->comment('Incentive amount by respective officer');
            $table->longText('remarks')->nullable()->comment('Remarks of perticular application');
            $table->bigInteger('created_by')->nullable()->comment('PK of user table');
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
        Schema::dropIfExists('application_progress_masters');
    }
}
