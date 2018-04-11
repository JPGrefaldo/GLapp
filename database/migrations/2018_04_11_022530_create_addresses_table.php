<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street_number');
            $table->string('route');
            $table->string('neighborhood');
            $table->string('locality');
            $table->string('administrative_area_level_1');
            $table->string('country');
            $table->string('postal_code');
            $table->boolean('address');
            $table->integer('client_id')->unsigned()->nullable();
            $table->timestamps();
            
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
        Schema::dropIfExists('addresses');
    }
}
