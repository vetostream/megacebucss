<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostcomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postscom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content',300);

            $table->integer('post_id')->unsigned();
            $table->integer('user_comment')->unsigned();

            $table->foreign('post_id')->references('id')->on('posts');
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
        //
    }
}
