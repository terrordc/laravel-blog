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
        

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            // 1 - user, 2 - editor, 3 - admin
            $table->tinyInteger('role_id')->unsigned()->default('1')->references('id')->on('roles')->after('remember_token')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');

        Schema::table('users', function($table){

            $table->dropColumn(['role_id']);

         });
    }
};
