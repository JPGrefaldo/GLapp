<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id');
            $table->integer('contract_id');
            $table->integer('charge_id');
            $table->decimal('rate',10,2);
            $table->decimal('amount',10,2);
            $table->boolean('cap');
            $table->decimal('cap_value',10,2);
            $table->enum('charge_type',['Standard','Special','Installment']);
            $table->integer('free_page');
            $table->decimal('charge_doc',10,2);
            $table->integer('consumable_time');
            $table->decimal('excess_rate',10,2);
            $table->decimal('rate_1',10,2);
            $table->decimal('rate_2',10,2);
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
        Schema::dropIfExists('transaction_details');
    }
}
