<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->enum('contract_type', array('Special','General'));
            $table->string('contract_number')->unique();
            $table->date('contract_date');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status',array('Open','Close'))->default('Open');
            $table->decimal('amount_cost',10,2)->default(0);
            $table->text('other_conditions')->nullable();
            $table->timestamps();

            $table->foreign('transaction_id')
                ->references('id')
                ->on('transactions')->onDelete('cascade');
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
