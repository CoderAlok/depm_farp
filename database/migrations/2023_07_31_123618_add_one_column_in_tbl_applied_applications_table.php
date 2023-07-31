<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOneColumnInTblAppliedApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_applied_applications', function (Blueprint $table) {
            $table->string('order_file_name', 100)->nullable()->comment('Order file name')->after('description');
            $table->decimal('appealed_amount', 10, 2)->nullable()->default(0.00)->comment('Final amount given by department secretory.')->after('order_file_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_applied_applications', function (Blueprint $table) {
            $table->dropColumn('order_file_name');
            $table->dropColumn('appealed_amount');
        });
    }
}
