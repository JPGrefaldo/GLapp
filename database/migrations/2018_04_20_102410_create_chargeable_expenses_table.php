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
            $table->integer('case_mgt_id')->unsigned()->nullable();
            $table->text('description');
            $table->decimal('amount');
            $table->text('explanation');
            $table->timestamps();

            $table->foreign('case_mgt_id')
            ->references('id')
            ->on('case_managements');
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
