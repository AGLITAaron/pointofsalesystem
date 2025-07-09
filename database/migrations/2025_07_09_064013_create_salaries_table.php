<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblsalary', function (Blueprint $table) {
            $table->id('SalaryID');
            $table->decimal('Salary', 10, 2)->nullable();
            $table->timestamps();
        });

        DB::table('tblsalary')->insert([
            [
                'Salary' => '10000.00',
            ],
            [
                'Salary' => '15000.00',
            ],
            [
                'Salary' => '25000.00',
            ],
            [
                'Salary' => '18000.00',
            ],
            [
                'Salary' => '20000.00',
            ],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblsalary');
    }
}
