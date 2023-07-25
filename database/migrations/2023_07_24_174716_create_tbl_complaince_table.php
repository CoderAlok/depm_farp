<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblComplainceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_complaince', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of tbl_application_details');
            $table->bigInteger('exporter_id')->nullable()->comment('PK of tbl_exporters');
            $table->bigInteger('user_id')->nullable()->comment('PK of user');
            $table->integer('section_type')->unsigned()->nullable()->comment('Section type ids');
            $table->text('description')->nullable()->comment('Complaince description');
            $table->string('file_name', 255)->nullable()->comment('Name of the reverted file by the exporter');
            $table->bigInteger('created_by')->nullable()->comment('PK of Users table');
            $table->bigInteger('updated_by')->nullable()->comment('PK of tbl_exporters');
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
        Schema::dropIfExists('tbl_complaince');
    }
}
