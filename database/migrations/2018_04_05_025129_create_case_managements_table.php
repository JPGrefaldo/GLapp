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
            $table->foreign('contract_id')->reference('id')->on('contracts');
            $table->string('title');
            $table->string('venue');
            $table->string('case_number');
            $table->enum('case_classification',['Administrative','Criminal','Civil',
                                   'Collection Retainer','Genereal Reatiner','Labor']);
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
        Schema::dropIfExists('case_managements');
    }
}
