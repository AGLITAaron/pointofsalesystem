<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_region', function (Blueprint $table) {
            $table->id('region_id')->uniqid();
            $table->string('region_name', 255)->nullable();
            $table->text('reion_decription')->nullable();
            $table->timestamps();
        });

        DB::table('tbl_region')->insert([
            [
                'region_name' => 'NCR',
                'region_description' => 'National Capital Region',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'CAR',
                'region_description' => 'Cordillera Administrative Region',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region I',
                'region_description' => 'Ilocos Region',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region II',
                'region_description' => 'Cagayan Valley',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region III',
                'region_description' => 'Central Luzon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region IV-A',
                'region_description' => 'CALABARZON',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region IV-B',
                'region_description' => 'MIMAROPA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region V',
                'region_description' => 'Bicol Region',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region VI',
                'region_description' => 'Western Visayas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region VII',
                'region_description' => 'Central Visayas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region VIII',
                'region_description' => 'Eastern Visayas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region IX',
                'region_description' => 'Zamboanga Peninsula',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region X',
                'region_description' => 'Northern Mindanao',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region XI',
                'region_description' => 'Davao Region',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region XII',
                'region_description' => 'SOCCSKSARGEN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'Region XIII',
                'region_description' => 'Caraga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'region_name' => 'BARMM',
                'region_description' => 'Bangsamoro Autonomous Region in Muslim Mindanao',
                'created_at' => now(),
                'updated_at' => now(),
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
        Schema::dropIfExists('regions');
    }
}
