<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik');
            $table->string('section');
            $table->string('brl', 50);
            $table->dateTime('date');
            $table->time('time');
            $table->string('location', 50);
            $table->string('detail_location');
            $table->string('danger_category', 20);
            $table->string('danger_code', 2);
            $table->string('description');
            $table->string('risk');
            $table->string('action');
            $table->string('status', 10);
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
