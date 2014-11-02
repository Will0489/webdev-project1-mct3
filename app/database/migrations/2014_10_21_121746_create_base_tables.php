<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBaseTables extends Migration {

	public function up()
	{
        Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('email')->unique();
            $table->string('photo');
            $table->text('about')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('location')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('remember_token');
			$table->timestamps();
		});

        Schema::create('profiles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->biginteger('uid')->unsigned();
            $table->string('access_token');
            $table->string('access_token_secret');
            $table->timestamps();
        });

        Schema::create('posts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->integer('upvotes');
            $table->integer('posted_by')->unsigned();
            $table->foreign('posted_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->text('body');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('comment_by')->unsigned();
            $table->foreign('comment_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('upvotes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->integer('upvoted_by')->unsigned();
            $table->foreign('upvoted_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
	}

	public function down()
	{
        Schema::drop('comments');
        Schema::drop('upvotes');
        Schema::drop('posts');
        Schema::drop('profiles');
		Schema::drop('users');

	}

}
