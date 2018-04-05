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
            $table->foreign('sr_id')->reference('id')->on('service_report');
            $table->date('date_rendered');
            $table->foreign('contract_id')->reference('id')->on('contracts');
            $table->foreign('case_mgt_id')->reference('id')->on('case_managements');
            $table->foreign('counsel_id')->reference('id')->on('counsels');
            $table->text('description');
            $table->decimal('amount');
            $table->decimal('trsut_fund');
            $table->string('type');
            $table->text('explanation');
            $table->timestamps();
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
