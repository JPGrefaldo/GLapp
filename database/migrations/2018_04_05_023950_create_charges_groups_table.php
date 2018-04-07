<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charges_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fees_detail_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('fees_detail_id')
            ->references('id')
            ->on('fees_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charges_groups');
    }
}
