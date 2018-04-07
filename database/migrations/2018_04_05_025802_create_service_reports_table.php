<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_render');
            $table->integer('contract_id')->unsigned()->nullable();
            $table->integer('counsel_id')->unsigned()->nullable();
            $table->integer('fees_detail_id')->unsigned()->nullable();
            $table->text('description');
            $table->timestamps();


            $table->foreign('contract_id')
            ->references('id')
            ->on('contracts');

            $table->foreign('counsel_id')
            ->references('id')
            ->on('case_managements');

            $table->foreign('fees_detail_id')
            ->references('id')
            ->on('fees_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_reports');
    }
}
