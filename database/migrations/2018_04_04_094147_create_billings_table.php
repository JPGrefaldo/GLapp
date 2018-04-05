<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('counsel_id')->reference('id')->on('counsel');
            $table->foreign('client_id')->reference('id')->on('clients');
            $table->decimal('billing_number');
            $table->date('billing_date');
            $table->decimal('unpaid_balance');
            $table->decimal('billing_amount');
            //$table->date('last_payment');
            //$table->decimal('last_paid');
            $table->decimal('gen_retainers_fee');
            $table->decimal('total_pf');
            $table->decimal('chargeable_expense');
            $table->integer('excess_hours');
            //$table->date('current_due');
            $table->string('adjustment');
            $table->decimal('balance_forward');
            $table->boolean('possible_billings');
            $table->date('period_to');
            $table->date('period_from');
            $table->integer('total_hrs');
            $table->integer('excess_hrs');
            $table->integer('total_sr');
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
        Schema::dropIfExists('billings');
    }
}
