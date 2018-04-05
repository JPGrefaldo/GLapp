<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_details', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('chargeable_id')->reference('id')->on('chargeables');
            $table->decimal('rate');
            $table->decimal('amount');
            $table->boolean('cap');
            $table->decimal('cap_value');
            $table->enum('charge_type',['Standard','Special','Installment']);
            $table->integer('free_page');
            $table->decimal('charge_doc');
            $table->integer('consumable_time');
            $table->decimal('excess_rate');
            $table->decimal('rate_1');
            $table->decimal('rate_2');
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
        Schema::dropIfExists('fees_details');
    }
}
