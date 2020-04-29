<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceOrderTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_order', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->integer('type_service_id')->unsigned();
            $table->string('priority', 15);
            $table->integer('requestor_id')->unsigned();
            $table->integer('technical_support_id')->unsigned();
            $table->integer('equipment_id')->unsigned();
            $table->string('status', 15);
            $table->dateTime('start');
            $table->dateTime('deadline');
            $table->string('geopos')->default("");
            $table->integer('technical_operator_id')->unsigned()->nullable();
            $table->text('tech_support_comments')->nullable();
            $table->text('tech_operator_comments')->nullable();
            $table->text('tech_operator_signature')->nullable();
            $table->integer('company_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('requestor_id')->references('id')->on('users');
            $table->foreign('technical_support_id')->references('id')->on('users');
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->foreign('company_id')->references('id')->on('company');
            $table->foreign('type_service_id')->references('id')->on('type_service');
            $table->foreign('technical_operator_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_order');
    }
}
