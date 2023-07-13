<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblApplicationEventDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_application_event_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('appl_id')->nullable()->comment('PK of tbl_application_details');
            $table->longText('details')->nullable()->comment('Event details will be added here');
            $table->tinyInteger('event_type')->nullable()->comment('1: Exhibition, 2: Conference, 3: Other');
            $table->text('other_event_type')->nullable()->comment('Other event details if event type 3 is selceted.');
            $table->tinyInteger('participation_type')->nullable()->comment('1: Delegates, 2: Exhibit');
            $table->string('city', 255)->nullable()->comment('city name');
            $table->integer('country_id')->unsigned()->nullable()->comment('PK of Country table');
            $table->boolean('status')->nullable()->default(false);
            $table->bigInteger('created_by')->nullable()->comment('PK of tbl_exporter');
            $table->bigInteger('updated_by')->nullable()->comment('PK of user');
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
        Schema::dropIfExists('tbl_application_event_details');
    }
}
