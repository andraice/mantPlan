<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipmentTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('serial_number');
            $table->dateTime('startup_date');
            $table->string('equipment_status');
            $table->string('image');
            $table->text('location_address');
            $table->string('location_geo');
            $table->char('status');
            $table->integer('equipment_model_id')->unsigned();
            $table->integer('equipment_type_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('equipment_model_id')->references('id')->on('equipment_model');
            $table->foreign('equipment_type_id')->references('id')->on('equipment_type');
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
        Schema::drop('equipment');
    }
}
