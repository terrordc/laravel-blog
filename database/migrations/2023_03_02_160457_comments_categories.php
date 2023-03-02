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
            $table->text('body');
            $table->string('user_id');
            $table->timestamps();
            $table->unsignedMediumInteger('likes')->nullable();
        });
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });

        Schema::table('posts', function($table){
            $table->integer('user_id')->unsigned()->references('id')->on('users')->after('body');
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
