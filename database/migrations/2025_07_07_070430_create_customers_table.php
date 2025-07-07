<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblcustomers', function (Blueprint $table) {
            $table->id('CustomerID');
            $table->string('CustomerNumber')->nullable();
            $table->string('CustomerName')->nullable();
            $table->integer('GenderID')->default(0);
            $table->string('Province', 255)->nullable();
            $table->string('Municipality', 255)->nullable();
            $table->string('Barangay', 255)->nullable();
            $table->string('CompleteAddress', 255)->nullable();
            $table->date('RegistrationDate')->nullable();
            $table->integer('BranchRegistered')->default(0);
            $table->integer('CreatedBy')->default(0);
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
        Schema::dropIfExists('customers');
    }
}
