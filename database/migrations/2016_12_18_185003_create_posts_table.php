<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //Create table posts 
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',255);
            $table->string('content',255);
            $table->timestamps();
        });

        //Alter table posts adding user_id as foreign key constraint
        Schema::table('posts', function($table){
            $table->integer('user_id')->unsigned();

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
        Schema::dropIfExists('posts');
    }
}
