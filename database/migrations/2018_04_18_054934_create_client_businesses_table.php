<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('oic')->nullable();
            $table->string('contract')->nullable();
            $table->enum('business_nature',['Corporate','Infrastructure',
                                            'advertising',
                                            'Media broadcasting',
                                            'Contraction',
                                            'Consulting',
                                            'IT/Telco',
                                            'transportation',
                                            'Logistics',
                                            'Finance',
                                            'entertainment',
                                            'Clothing',
                                            'Cosmetics',
                                            'Agriculture',
                                            'Hospitality/Tourism',
                                            'NGO',
                                            'LGU',
                                            'Others'])->nullable();
            $table->string('street_number')->nullable();
            $table->string('route')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('locality')->nullable();
            $table->string('administrative_area_level_1')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->timestamps();
            
            $table->foreign('client_id')
            ->references('id')
            ->on('clients')
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
        Schema::dropIfExists('client_businesses');
    }
}
