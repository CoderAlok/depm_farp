<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSenctionDetailsColumnInTblApplicationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_application_details', function (Blueprint $table) {
            $table->dateTime('sanction_order_date')->nullable()->after('certi_payment_reciept_file');
            $table->dateTime('payment_released_date')->nullable()->after('sanction_order_date');
            $table->string('payment_order_attachment', 100)->nullable()->default(null)->after('payment_released_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_application_details', function (Blueprint $table) {
            $table->dropColumn('sanction_order_date');
            $table->dropColumn('payment_released_date');
            $table->dropColumn('payment_order_attachment');
        });
    }
}
