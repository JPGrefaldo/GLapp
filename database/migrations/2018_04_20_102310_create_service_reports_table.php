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
            $table->integer('transaction_id')->unsigned()->nullable();
            $table->integer('transaction_fee_detail_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('transaction_fee_detail_id')
            ->references('id')
            ->on('transaction_fee_details');

            $table->foreign('transaction_id')
            ->references('id')
            ->on('transactions');
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
