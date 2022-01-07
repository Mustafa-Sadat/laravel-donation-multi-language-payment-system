<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supporteds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('place');
            $table->string('gender');
            $table->integer('age');
            $table->text('disc');
            $table->string('language');
            $table->string('img');
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
        Schema::dropIfExists('supporteds');
    }
}
