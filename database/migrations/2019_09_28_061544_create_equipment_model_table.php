<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipmentModelTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_model', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->char('status');
            $table->integer('user_id')->unsigned();
            $table->integer('equipment_brand_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('equipment_brand_id')->references('id')->on('equipment_brand');
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
        Schema::drop('equipment_model');
    }
}
