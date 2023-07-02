<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSchemeMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_scheme_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 100)->nullable()->comment('Scheme Code');
            $table->longText('long_name', 100)->nullable()->comment('Scheme long name');
            $table->text('short_name')->nullable()->comment('Scheme short name');
            $table->boolean('status')->nullable()->default(false)->comment('Active/Inactive');
            $table->bigInteger('created_by')->nullable()->comment('PK of user table');
            $table->bigInteger('updated_by')->nullable()->comment('PK of user table');
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
        Schema::dropIfExists('tbl_scheme_master');
    }
}
