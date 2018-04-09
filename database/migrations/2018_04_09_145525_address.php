<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Address extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->increments('id');
        $table->integer('counsel_id')->unsigned()->nullable();
        $table->integer('client_id')->unsigned()->nullable();
        $table->string('country');
        $table->string('state');
        $table->string('city');
        $table->string('town');
        $table->string('street')->nullable();
        $table->string('route')->nullable();
        $table->boolean('billing_address');
        $table->timestamps();

        $table->foreign('client_id')
        ->references('id')
        ->on('clients');

        $table->foreign('counsel_id')
        ->references('id')
        ->on('counsels');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Address');
    }
}
