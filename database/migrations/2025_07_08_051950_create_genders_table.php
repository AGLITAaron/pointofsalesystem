<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblgender', function (Blueprint $table) {
            $table->id('GenderID');
            $table->string('Gender')->nullable();
            $table->timestamps();
        });

        DB::table('tblgender')->insert([
            [
                'Gender' => 'Male',
            ],
            [
                'Gender' => 'Female'
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
        Schema::dropIfExists('genders');
    }
}
