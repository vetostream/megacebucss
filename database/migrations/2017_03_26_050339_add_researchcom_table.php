<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResearchcomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchcom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content',300);

            $table->integer('research_id')->unsigned();
            $table->integer('user_comment')->unsigned();

            $table->foreign('research_id')->references('id')->on('researches');
            $table->foreign('user_comment')->references('id')->on('users');
                        
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
        Schema::dropIfExists('researchcom');
    }
}
