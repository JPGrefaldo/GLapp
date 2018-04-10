<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profile_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->integer('icoe_id')->unsigned()->nullable();
            $table->integer('secqa_id')->unsigned()->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->enum('type',array('present_address','permanent_address','telephone','mobile','fax'));
            $table->text('description');
            $table->timestamps();

            $table->foreign('profile_id')
                ->references('id')->on('profiles')
                ->onDelete('cascade');

            $table->foreign('icoe_id')
                ->references('id')->on('icoe_infos')
                ->onDelete('cascade');

            $table->foreign('secqa_id')
                ->references('id')->on('security_q_as')
                ->onDelete('cascade');

            $table->foreign('company_id')
                ->references('id')->on('companies')
                ->onDelete('cascade');

            $table->foreign('client_id')
                ->references('id')->on('clients')
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
        Schema::dropIfExists('contact_infos');
    }
}
