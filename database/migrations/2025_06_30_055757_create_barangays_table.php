<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_barangay', function (Blueprint $table) {
            $table->id('barangay_id')->uniqid();
            $table->integer('municipality_id')->default(0);
            $table->string('barangay_name', 250)->nullable();
            $table->integer('zipcode')->default(0);
            $table->timestamps();
        });

        DB::table('tbl_barangay')->insert([
            'municipality_id' => 'Admin User',
            'barangay_name' => 'talens.aaron@gmail.com',
            'zipcode' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangays');
    }
}
