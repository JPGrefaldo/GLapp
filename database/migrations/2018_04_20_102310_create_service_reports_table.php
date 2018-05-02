<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('case_management_id')->unsigned()->nullable();
            $table->integer('chargeable_expenses')->unsigned()->nullable();
            $table->text('description');
            $table->timestamps();

            $table->foreign('case_management_id')
            ->references('id')
            ->on('case_managements');
            
            $table->foreign('chargeable_expenses')
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
        Schema::dropIfExists('service_reports');
    }
}
