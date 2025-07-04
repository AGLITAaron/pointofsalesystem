<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->id('ProductID')->uniqid();
            $table->string('ProductCode', 255)->nullable();
            $table->string('ProductName', 255)->nullable();
            $table->integer('Quantity')->default(0);
            $table->decimal('Amount', 10, 2)->nullable();
            $table->text('ProductDesctiption')->nullable();
            $table->integer('created_by')->default(0);
            $table->integer('update_by')->default(0);
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
        Schema::dropIfExists('products');
    }
}
