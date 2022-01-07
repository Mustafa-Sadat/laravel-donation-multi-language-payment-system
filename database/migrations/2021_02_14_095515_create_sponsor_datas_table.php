<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_datas', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
                    
            $table->integer('sponsorship_level');
            $table->string('status')->default('draft');

            $table->integer('suported_id')->unsigned();
            $table->foreign('suported_id')
                    ->references('id')
                    ->on('supporteds')
                    ->onDelete('cascade');
            
            $table->integer('total_price')->default(0);

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
        Schema::dropIfExists('sponsor_datas');
    }
}
