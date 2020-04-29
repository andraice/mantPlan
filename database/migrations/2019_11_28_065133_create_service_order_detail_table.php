<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServiceOrderDetailTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->double('tiempo');
            $table->string('revision_status');
            $table->string('work_status');
            $table->text('description');
            $table->integer('service_order_id')->unsigned();
            $table->text('tech_support_comments')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('service_order_id')->references('id')->on('service_order');
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
        Schema::drop('service_order_detail');
    }
}
