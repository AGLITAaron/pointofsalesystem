<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateEmployementStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_employement_status', function (Blueprint $table) {
            $table->id('Id')->uniqid();
            $table->string('Status', 255)->nullable();
            $table->timestamps();
        });

        DB::table('tbl_employement_status')->insert([
            [
                'Status' => 'Employed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Status' => 'Self-employed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Status' => 'Ofw',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Status' => 'Student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Status' => 'Unemployed',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // You can add more arrays here for more users
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employement_statuses');
    }
}
