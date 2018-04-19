<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->enum('plaintiff',['Respondent','Complainant','Defendant']);
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
                                            'Others']);
            $table->string('email');
            $table->integer('billing');
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
        Schema::dropIfExists('clients');
    }
}
