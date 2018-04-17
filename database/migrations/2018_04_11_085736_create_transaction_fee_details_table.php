<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionFeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_fee_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id')->unsigned();
            $table->integer('fee_id');
            $table->enum('charge_type',['Standard','Special','Installment']);
            $table->integer('free_page')->default(0);
            $table->decimal('charge_doc',10,2)->default(0);
            $table->decimal('rate_1',10,2)->default(0);
            $table->decimal('rate_2',10,2)->default(0);
            $table->decimal('rate',10,2)->default(0);
            $table->integer('consumable_time')->default(0);
            $table->decimal('excess_rate',10,2)->default(0);
            $table->decimal('amount',10,2)->default(0);
            $table->boolean('cap')->default(0);
            $table->decimal('cap_value',10,2)->default(0);
            $table->timestamps();

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
        Schema::dropIfExists('transaction_fee_details');
    }
}
