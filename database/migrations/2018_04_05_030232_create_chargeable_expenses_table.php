<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeableExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chargeable_expenses', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('sr_id')->unsigned()->nullable();
            $table->integer('contract_id')->unsigned()->nullable();
            $table->integer('case_mgt_id')->unsigned()->nullable();
            $table->integer('counsel_id')->unsigned()->nullable();
            $table->date('date_rendered');
            $table->text('description');
            $table->decimal('amount');
            $table->decimal('trsut_fund');
            $table->string('type');
            $table->text('explanation');
            $table->timestamps();


            $table->foreign('sr_id')
            ->references('id')
            ->on('service_reports');

            $table->foreign('contract_id')
            ->references('id')
            ->on('contracts');

            $table->foreign('case_mgt_id')
            ->references('id')
            ->on('case_managements');

            $table->foreign('counsel_id')
            ->references('id')
            ->on('counsels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chargeable_expenses');
    }
}
