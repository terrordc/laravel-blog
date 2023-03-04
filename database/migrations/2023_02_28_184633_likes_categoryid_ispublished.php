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
        Schema::table('posts', function($table){
            $table->unsignedMediumInteger('likes')->nullable();
            $table->unsignedMediumInteger('category_id')->nullable()->references('id')->on('posts')->onDelete('cascade');
            $table->boolean('is_published')->nullable();
            $table->string('slug')->unique()->after('body')->nullable();
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function($table){
            $table->dropColumn(['likes', 'category_id', 'is_published','slug']);

         });
    }
};
