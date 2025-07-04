<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class SpAccounts extends Migration
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
           DROP PROCEDURE IF EXISTS sp_accounts;

            CREATE PROCEDURE sp_accounts(
                IN xUserID INT, 
                IN xUsername VARCHAR(250),
                IN xPassword VARCHAR(250),
                IN xNewPassword VARCHAR(250),
                IN xFName VARCHAR(250),
                IN xMName VARCHAR(250),
                IN xLName VARCHAR(250),
                IN xBirthday DATE,
                IN xCellphone VARCHAR(250),
                IN xAction INT
            )
            BEGIN
                IF xAction = 1 THEN
                    UPDATE tbluser_accounts 
                        SET `Password` = xNewPassword, `PasswordExpiration` = DATE_ADD(CURRENT_DATE, INTERVAL 3 MONTH), `AcountStatus` = 1
                    WHERE Username COLLATE utf8mb4_unicode_ci = xUsername COLLATE utf8mb4_unicode_ci;

                    SELECT 'You have successfully updated your password. You can now login to the system' AS SuccessMessage;

                ELSEIF xAction = 0 THEN
                    IF EXISTS (SELECT 1 FROM tbluser_accounts WHERE `Username` COLLATE utf8mb4_unicode_ci = xUsername COLLATE utf8mb4_unicode_ci) THEN
                        SELECT 'The username you entered already exists.' AS ErrorMessage;
                    ELSE
                        INSERT INTO `accountingdb`.`tbluser_accounts`(`Username`, `Password`, `FName`, `MName`, `LName`, `Birthday`, `PasswordExpiration`, `created_at`) 
                            VALUES(xUsername, xPassword, xFName, xMName, xLName, xBirthday, DATE_ADD(CURRENT_DATE, INTERVAL 3 MONTH), CURRENT_TIMESTAMP());

                        SET @lastInsertedUserID = LAST_INSERT_ID();

                        INSERT INTO `accountingdb`.`tbluser_contact_numbers`(`UserID`, `CellPhoneNumber`, `created_at`) 
                            VALUES(@lastInsertedUserID, xCellphone, CURRENT_TIMESTAMP());

                        SELECT 'You have successfully registered to the system. Wait a few minutes to activate your account before login.' AS SuccessMessage;
                    END IF;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS sp_accounts');
    }
}
