<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblemployees', function (Blueprint $table) {
            $table->id('EmployeeID');
            $table->string('EmployeeName', 255)->nullable();
            $table->string('ContactNumber', 255)->nullable();
            $table->date('Birthday')->nullable();
            $table->integer('SalaryID')->default(0);
            $table->integer('GenderID')->default(0);
            $table->string('Province', 255)->nullable();
            $table->string('Municipality', 255)->nullable();
            $table->string('Barangay', 255)->nullable();
            $table->string('CompleteAdddress', 255)->nullable();
            $table->datetime('Datehired')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
