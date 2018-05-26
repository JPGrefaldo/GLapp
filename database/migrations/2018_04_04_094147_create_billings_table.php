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
            $table->integer('counsel_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->decimal('billing_number');
            $table->date('billing_date');
            $table->decimal('unpaid_balance',10, 2);
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


            $table->foreign('counsel_id')
            ->references('id')
            ->on('counsels');
            
            $table->foreign('client_id')
            ->references('id')
            ->on('clients');
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
