<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbluser_accounts', function (Blueprint $table) {
            $table->id('UserID')->unique();
            $table->string('Username')->nullable();
            $table->string('Password')->nullable();
            $table->string('FName')->nullable();
            $table->string('MName')->nullable();
            $table->string('LName')->nullable();
            $table->date('Birthday')->nullable();
            $table->date('PasswordExpiration')->nullable();
            $table->integer('AcountStatus')->default(0); 
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
        Schema::dropIfExists('user_models');
    }
}
