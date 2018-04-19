<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_id')->unsigned()->nullable();
            $table->boolean('temp')->default(1);
            $table->text('title')->nullable();
            $table->text('venue')->nullable();
            $table->date('date')->nullable();
            $table->string('number')->nullable();
            $table->string('docket')->nullable();
            $table->enum('class', array('Administrative','Criminal','Civil','Collection Retainer','General Retainer','Labor','Special Project','Others'))->nullable();
            $table->enum('status', array('Open','Close'))->nullable();
            $table->timestamps();

            $table->foreign('transaction_id')
                ->references('id')->on('transactions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_managements');
    }
}
