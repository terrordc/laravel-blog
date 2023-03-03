<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->integer('user_id')->unsigned()->references('id')->on('users')->onDelete('cascade');
            $table->integer('post_id')->unsigned()->references('id')->on('posts')->onDelete('cascade');
            $table->boolean('approved');
            $table->unsignedMediumInteger('likes')->nullable();
            $table->timestamps();
           
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });

        Schema::table('posts', function($table){
            $table->integer('user_id')->unsigned()->references('id')->on('users')->after('body')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');

        Schema::dropIfExists('categories');

        Schema::table('posts', function($table){
            $table->dropColumn(['user_id']);

         });
    }
};
