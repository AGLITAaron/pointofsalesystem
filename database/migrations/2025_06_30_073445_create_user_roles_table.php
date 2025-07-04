<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_role', function (Blueprint $table) {
            $table->id('RoleID')->uniqid();
            $table->string('Role', 255)->nullable();
            $table->integer('CreatedBy')->default(0);
            $table->integer('UpdatedBy')->default(0);
            $table->timestamps();
        });

        DB::table('tbl_user_role')->insert([
            [
                'Role' => 'Administrator',
            ],
            [
                'Role' => 'Staff',
            ],
            [
                'Role' => 'User',
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
        Schema::dropIfExists('user_roles');
    }
}
