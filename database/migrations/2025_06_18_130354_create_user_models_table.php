<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

        DB::table('tbluser_accounts')->insert([
            [
                'Username' => 'Aaron',
                'Password' => Hash::make('Talens08'),
                'FName' => 'Aaron',
                'MName' => 'Mangahas',
                'LName' => 'Talens',
                'Birthday' => '1998-09-03',
                'PasswordExpiration' => Carbon::now()->addMonths(3), // 2 months from now,
                'AcountStatus' => 1,
                'created_at' => now(),

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
        Schema::dropIfExists('user_models');
    }
}
