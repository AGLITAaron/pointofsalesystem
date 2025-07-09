<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyEmployees extends Migration
{
    public function up()
    {
        // First, rename the column
        Schema::table('tblemployees', function (Blueprint $table) {
            $table->renameColumn('EmployeeName', 'UserID');
        });

        // Then, change UserID datatype and drop Birthday
        Schema::table('tblemployees', function (Blueprint $table) {
            $table->integer('UserID')->default(0)->change(); // make sure doctrine/dbal is installed
            $table->dropColumn('Birthday');
        });
    }

    public function down()
    {
        // Reverse: Rename UserID back to EmployeeName
        Schema::table('tblemployees', function (Blueprint $table) {
            $table->renameColumn('UserID', 'EmployeeName');
        });

        // Change back to string and re-add Birthday
        Schema::table('tblemployees', function (Blueprint $table) {
            $table->string('EmployeeName', 255)->nullable()->change(); // restore original type
            $table->date('Birthday')->nullable(); // re-add Birthday
        });
    }
}
