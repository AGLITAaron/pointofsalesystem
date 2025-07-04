<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            DB::unprepared("
            DROP PROCEDURE IF EXISTS sp_role;

            CREATE  PROCEDURE `sp_role`(IN xRoleID INT, IN xRole VARCHAR(255), IN xAction VARCHAR(200))
            BEGIN
                IF xAction = 'Update' THEN
                    UPDATE tbl_user_role 
                        SET `Role` = xRole, updated_at = CURRENT_TIMESTAMP()
                    WHERE RoleID  = xRoleID;
                    SELECT 'You have successfully updated role in the system.' AS SuccessMessage;
	            ELSEIF xAction = 'Create' THEN
                    IF EXISTS (SELECT 1 FROM tbl_user_role WHERE `Role` COLLATE utf8mb4_unicode_ci = xRole COLLATE utf8mb4_unicode_ci) THEN
                        SELECT 'The role you entered already exists.' AS ErrorMessage;
                    ELSE
                        INSERT INTO tbl_user_role(`Role`, `created_at`) 
                        VALUES (xRole, CURRENT_TIMESTAMP());
                        SELECT 'You have successfully added new role in the system.' AS SuccessMessage;
                    END IF;
                ELSE
                    DELETE FROM tbl_user_role WHERE RoleID = xRoleID;
                    SELECT 'You have successfully deleted role in the system.' AS SuccessMessage;
                END IF;
            END;
        ");
        } catch (\Exception $e) {
            dd('Error creating procedure: ' . $e->getMessage());
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_role');
    }
}
