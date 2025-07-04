<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_unit', function (Blueprint $table) {
            $table->id('UnitID')->uniqid();
            $table->string('UnitName',255)->nullable();
            $table->string('UnitShortName',255)->nullable();
            $table->integer('Created_by')->nullable();
            $table->integer('Updated_by')->nullable();
            $table->timestamps();
        });

        DB::table('tbl_product_unit')->insert([
            [
                'UnitName' => 'Meter',
                'UnitShortName' => 'm',
                'created_at' => now(),
                
            ],
            [
                'UnitName' => 'Kilogram',
                'UnitShortName' => 'kg',
                'created_at' => now(),
               
            ],
            [
                'UnitName' => 'Second',
                'UnitShortName' => 's',
                'created_at' => now(),
               
            ],
            [
                'UnitName' => 'Ampere',
                'UnitShortName' => 'A',
                'created_at' => now(),
                
            ],
            [
                'UnitName' => 'Kelvin',
                'UnitShortName' => 'K',
                'created_at' => now(),
                
            ],
            [
                'UnitName' => 'Mole',
                'UnitShortName' => 'mol',
                'created_at' => now(),
                
            ],
            [
                'UnitName' => 'Candela',
                'UnitShortName' => 'cd',
                'created_at' => now(),
                
            ],
            [
                'UnitName' => 'Liter',
                'UnitShortName' => 'L',
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
        Schema::dropIfExists('product_units');
    }
}
